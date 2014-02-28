using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace GalaxyMerchantGuide
{
    public class AlianToRomanDictionary
    {
        internal Dictionary<string, string> Values;
        public AlianToRomanDictionary()
        {
            Values = new Dictionary<string, string>();
        }
        public AlianToRomanDictionary(Dictionary<string, string> alianNumberDictionary)
        {
            Values = alianNumberDictionary;
        }
        internal string ToRomanNumber(string alianNumber)
        {
            return Values[alianNumber];
        }
        internal string ToRomanNumber(List<string> alianNumber)
        {
            var romanNumber = "";
            alianNumber.ForEach(aNum =>
            {
                romanNumber += new AlianToRomanDictionary(Values).ToRomanNumber(aNum);
            });
            return romanNumber;
        }
        internal void FillDictionary(List<string> items)
        {
            items.ForEach(item =>
            {
                List<string> parts = item.Split(' ').ToList();
                Values.Add(parts[0], parts[2]);
            });

        }
    }
}
