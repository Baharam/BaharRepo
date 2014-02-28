using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace GalaxyMerchantGuide
{
    public class Credit
    {
        public Dictionary<string, string> CreditValues { get; set; }
        public Credit()
        {
            CreditValues = new Dictionary<string, string>();
        }
        /// <summary>
        /// Calculate Credit values by translating creditStatements and using AlianNumberDictionary 
        /// </summary>
        /// <param name="creditStatements"></param>
        /// <param name="alianNumberDictionary"></param>
        internal void CalculateCreditValues(List<string> creditStatements,Dictionary<string,string> alianNumberDictionary)
        {
            creditStatements.ForEach(item =>
            {
                List<string> parts = item.Split(' ').ToList();
                var romanNumber = new AlianToRomanDictionary(alianNumberDictionary).ToRomanNumber(parts.Take(parts.Count - 4).ToList());
                var romanAmount = new RomanNumber().Calculate(romanNumber);
                CreditValues.Add(parts[parts.Count-4], (System.Convert.ToInt32(parts[parts.Count - 2]) / romanAmount).ToString());
            });
        }
    }
}
