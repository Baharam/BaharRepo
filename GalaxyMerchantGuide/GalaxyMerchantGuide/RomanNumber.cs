using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace GalaxyMerchantGuide
{
    internal class RomanNumber
    {
        public Dictionary<char, int> RomanNumeralValues = new Dictionary<char, int>()
	    {
            { 'I', 1}, {'V' ,5}, {'X',10}, {'L', 50}, {'C' , 100}, {'D' ,500}, {'M' ,1000} 
        }; 
        private String[] repetitionTest = { "(IIII+)", "(XXXX+)", "(CCCC+)", "(MMMM+)", "(DD+)", "(LL+)", "(VV+)" };
        /// <summary>
        /// Convert roman number to integer value
        /// </summary>
        /// <param name="numbers"></param>
        /// <returns></returns>
        public int Calculate(string romanNumber)
        {
            List<int> number = _GetNumbers(romanNumber.ToList());
            number = _MinusAssigner(number);
            int result = 0;
            if (_ValidateRepetition(romanNumber))
            {
                if (_ValidSubtraction(number))
                {
                    if (number.Count() > 0)
                    {
                        number.ForEach(item =>
                        {
                            result += item;
                        });
                        return result;
                    }
                }
            }
            return -1;
        }
        /// <summary>
        /// Convert rman number to its equivalent integer
        /// </summary>
        /// <param name="c"></param>
        /// <returns>returns -1 if the number does not exist</returns>
        private int _GetRomanNumValue(char c)
        {
            try
            {
                return RomanNumeralValues[c];
            }
            catch (Exception)
            {
                return -1;
            }
        }
        /// <summary>
        /// Assign minus if the next number is reater than the prvious one
        /// </summary>
        /// <param name="numbers"></param>
        /// <returns></returns>
        private List<int> _MinusAssigner(List<int> numbers)
        {
            int currentElement;
            for (int i = 0; i < numbers.Count() - 1; i++)
            {
                currentElement = numbers[i];
                if (currentElement < numbers[i + 1])
                {
                    numbers[i] = -currentElement;
                }
            }
            return numbers;
        }
        /// <summary>
        /// using roman symbol 
        /// </summary>
        /// <param name="chars"></param>
        /// <returns></returns>
        private List<int> _GetNumbers(List<char> chars)
        {
            int result;
            int length = chars.Count;
            List<int> numbers = new List<int>();
            chars.ForEach(item =>
            {
                result = RomanNumeralValues[item];
                if (result != -1)
                    numbers.Add(result);
            });
            return numbers;
        }
        /// <summary>
        /// Check item repetiotion in a roman number using Regular expression
        /// </summary>
        /// <param name="romanNumber"></param>
        /// <returns>true if repetitions are valid else false</returns>
        private bool _ValidateRepetition(string romanNumber)
        {
            String regex = "";
            for (int i = 0; i < repetitionTest.Length; i++)
            {
                regex = repetitionTest[i];
                if (System.Text.RegularExpressions.Regex.IsMatch(romanNumber, regex))
                    return false;
            }
            return true;
        }
        /// <summary>
        /// Check subtraction rules
        /// </summary>
        /// <param name="romanNumberValues">Use vales t check if they are sorted or not</param>
        /// <returns>rue if subtraction is permitted</returns>
        private bool _ValidSubtraction(List<int> romanNumberValues)
        {
            int number, nextNumber;
            for (int i = 0; i < romanNumberValues.Count() - 1; i++)
            {
                number = romanNumberValues[i];
                //get next item by ignoring the signs 
                nextNumber = Math.Abs(romanNumberValues[i + 1]);
                //"V"= 5, "L" = 50, and "D"=500 can never be subtracted
                if (number == -5 || number == -50 || number == -500)
                    return false;
                switch (Math.Abs(number))
                {
                    case 1:
                        if (nextNumber != RomanNumeralValues['V'] && nextNumber != RomanNumeralValues['X'] && nextNumber != number)
                            return false;
                        break;
                    case 10:
                        if (nextNumber != RomanNumeralValues['L'] && nextNumber != RomanNumeralValues['C'] && nextNumber != number)
                            return false;
                        break;
                    case 100:
                        if (nextNumber != RomanNumeralValues['D'] && nextNumber != RomanNumeralValues['M'] && nextNumber != number)
                            return false;
                        break;
                }
            }
            return true;
        }
    }
}
