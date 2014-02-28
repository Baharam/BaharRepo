using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace GalaxyMerchantGuide
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
            strFileNameTxt.ReadOnly = true;
        }
        private void btnOpenTextFileBtn_Click(object sender, EventArgs e)
        {
            String input = string.Empty;
            OpenFileDialog dialog = new OpenFileDialog();
            dialog.Filter =
               "txt files (*.txt)|*.txt";
            dialog.Title = "Select a text file";
            if (dialog.ShowDialog() == DialogResult.OK)
            {
                strFileNameTxt.Text = dialog.FileName;
                calculateBtn.Enabled = true;
            }
            if (strFileNameTxt.Text == String.Empty)
            {
                calculateBtn.Enabled = false;
                return;
            }
        }
        private void calculateBtn_Click_1(object sender, EventArgs e)
        {
            var contents = new List<string>();
            contents = FileReader.Read(strFileNameTxt.Text);
            var res = new Translator().Translate(contents);
            textBox1.Text = "";
            res.ForEach(item =>
            {
                textBox1.AppendText(item + Environment.NewLine + Environment.NewLine);
            });
        }
    }
}
