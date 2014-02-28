using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace GalaxyMerchantGuide
{
    public class Translator
    {
        /// <summary>
        /// regular expression to check input file pattern
        /// </summary>
        private Dictionary<string, string> inputPatterns = new Dictionary<string, string>()
	    {
            { "Number_Assumption", "^([a-z]+) is ([I|V|X|L|C|D|M])$"},
            { "Credit_Assumption","((?:[a-z]+ )+)([A-Z]\\w+) is (\\d+) ([A-Z]\\w+)$"},
            { "Q_Currency","^how much is ((?:\\w+[^0-9] )+)\\?$"},
            { "Q_Credit",  "^how many ([a-zA-Z]\\w+) is ((?:\\w+ )+)([A-Z]\\w+) \\?$"}
        };
        AlianToRomanDictionary alianToRomanDictionary;
        Credit credit;
        /// <summary>
        /// creates an instance of AlianToRomanDictionary, making sure using a constractor 
        /// which does not renew AlianToRomanDictionary().Values by using another instance which renews it
        /// by doing this we ensure that in each translation exactly one dictionary is created 
        /// create an instance of credit
        /// </summary>
        public Translator()
        {
            alianToRomanDictionary = new AlianToRomanDictionary(new AlianToRomanDictionary().Values);
            credit = new Credit();
        }
        /// <summary>
        /// Main function: it translates input file data to output desire data
        /// </summary>
        /// <param name="input"></param>
        /// <returns></returns>
        internal List<string> Translate(List<string> input)
        {
            List<string> answer = new List<string>();
            bool matchFound = false;
            if (input.Count() > 0)
            {
                foreach (string p in inputPatterns.Keys)
                {
                    var matchedItems = input.Where(c => System.Text.RegularExpressions.Regex.IsMatch(c, inputPatterns[p])).ToList();

                    if (matchedItems.Any())
                    {
                        switch (p)
                        {
                            case "Number_Assumption":
                                alianToRomanDictionary.FillDictionary(matchedItems);
                                break;
                            case "Credit_Assumption":
                                credit.CalculateCreditValues(matchedItems, alianToRomanDictionary.Values);
                                break;

                            case "Q_Currency":
                                answer.AddRange(_QCurrencyHandler(matchedItems));
                                break;

                            case "Q_Credit":
                                answer.AddRange(_QCreditHandler(matchedItems));
                                break;
                            default: 
                                answer.Add("I have no idea what you are talking about");
                            break;
                        }
                    }
                }
            }		
                answer.Add("I have no idea what you are talking about");
            return answer;
        }
        /// <summary>
        /// Answer to questions about currency(e.g. how much is pish tegj glob glob ?)
        /// using RomanNumber claculator method and AlianToRomanDictionary ToRomanNumber method
        /// </summary>
        /// <param name="questions"></param>
        /// <returns></returns>
        private List<string> _QCurrencyHandler(List<string> questions)
        {
            var res = new List<string>();
            questions.ForEach(item =>
              {
                  List<string> parts = item.Split(' ').ToList();

                  var alianNumber = parts.Skip(3).Take(parts.Count - 4).ToList();

                  var romanNumber = alianToRomanDictionary.ToRomanNumber(alianNumber);
                  var romanAmount = new RomanNumber().Calculate(romanNumber);

                  if (romanAmount != -1)                
                  res.Add(alianNumber.Aggregate((i,j)=>i +" " +j) + " is " + romanAmount);
                  else
                    res.Add(alianNumber.Aggregate((i, j) => i + " " + j) + " is invalid !!!");
              });
            return res;
        }
        /// <summary>
        /// Answer to questions about credits(e.g. how many Credits is glob prok Iron ?)
        /// using RomanNumber claculator method and AlianToRomanDictionary ToRomanNumber method
        /// </summary>
        /// <param name="questions"></param>
        /// <returns></returns>
        private List<string> _QCreditHandler(List<string> questions)
        {
            var res = new List<string>();
            questions.ForEach(item =>
            {
                List<string> parts = item.Split(' ').ToList();
                var alianNumber = parts.Skip(4).Take(parts.Count - 6).ToList();

                var romanNumber = alianToRomanDictionary.ToRomanNumber(alianNumber);
                var romanAmount = new RomanNumber().Calculate(romanNumber);

                var creditName=parts[parts.Count - 2];
                var thisCredit = credit.CreditValues[creditName];
                if (romanAmount!=-1)
                    res.Add(alianNumber.Aggregate((i, j) => i + " " + j) + " " + creditName + " is " + romanAmount * System.Convert.ToInt32(thisCredit) + " Credits");
                else
                    res.Add(alianNumber.Aggregate((i, j) => i + " " + j) + " " + creditName + " is invalid !!!");
            
            });
            return res;
        }
    }
}
