using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace GalaxyMerchantGuide
{
    public static class FileReader
    {
        public static List<string> Read(string filePath)
        {
            var fileContents = new List<string>();
            FileStream fs = null;
            fs = new FileStream(filePath, FileMode.Open, FileAccess.Read, FileShare.ReadWrite);
            using (TextReader tr = new StreamReader(fs))
            {
                string line;
                fs = null;
                while ((line = tr.ReadLine()) != null)
                {
                    fileContents.Add(line);
                }
            }
            if (fs != null)
                fs.Dispose();
            return fileContents;
        }
    }
}
