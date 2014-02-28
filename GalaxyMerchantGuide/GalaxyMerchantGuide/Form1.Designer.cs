namespace GalaxyMerchantGuide
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.openFileDialog1 = new System.Windows.Forms.OpenFileDialog();
            this.saveFileDialog1 = new System.Windows.Forms.SaveFileDialog();
            this.strFileNameTxt = new System.Windows.Forms.TextBox();
            this.label1 = new System.Windows.Forms.Label();
            this.calculateBtn = new System.Windows.Forms.Button();
            this.btnOpenTextFileBtn = new System.Windows.Forms.Button();
            this.textBox1 = new System.Windows.Forms.TextBox();
            this.SuspendLayout();
            // 
            // openFileDialog1
            // 
            this.openFileDialog1.FileName = "openFileDialog1";
            // 
            // strFileNameTxt
            // 
            this.strFileNameTxt.Location = new System.Drawing.Point(127, 25);
            this.strFileNameTxt.Name = "strFileNameTxt";
            this.strFileNameTxt.Size = new System.Drawing.Size(251, 20);
            this.strFileNameTxt.TabIndex = 1;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(9, 25);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(108, 13);
            this.label1.TabIndex = 2;
            this.label1.Text = "Choose a file as input";
            // 
            // calculateBtn
            // 
            this.calculateBtn.Enabled = false;
            this.calculateBtn.Location = new System.Drawing.Point(399, 54);
            this.calculateBtn.Name = "calculateBtn";
            this.calculateBtn.Size = new System.Drawing.Size(75, 23);
            this.calculateBtn.TabIndex = 3;
            this.calculateBtn.Text = "Calculate";
            this.calculateBtn.UseVisualStyleBackColor = true;
            this.calculateBtn.Click += new System.EventHandler(this.calculateBtn_Click_1);
            // 
            // btnOpenTextFileBtn
            // 
            this.btnOpenTextFileBtn.Location = new System.Drawing.Point(399, 25);
            this.btnOpenTextFileBtn.Name = "btnOpenTextFileBtn";
            this.btnOpenTextFileBtn.Size = new System.Drawing.Size(75, 23);
            this.btnOpenTextFileBtn.TabIndex = 4;
            this.btnOpenTextFileBtn.Text = "Browse";
            this.btnOpenTextFileBtn.UseVisualStyleBackColor = true;
            this.btnOpenTextFileBtn.Click += new System.EventHandler(this.btnOpenTextFileBtn_Click);
            // 
            // textBox1
            // 
            this.textBox1.Location = new System.Drawing.Point(12, 83);
            this.textBox1.Multiline = true;
            this.textBox1.Name = "textBox1";
            this.textBox1.ReadOnly = true;
            this.textBox1.ScrollBars = System.Windows.Forms.ScrollBars.Vertical;
            this.textBox1.Size = new System.Drawing.Size(461, 277);
            this.textBox1.TabIndex = 5;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(484, 372);
            this.Controls.Add(this.textBox1);
            this.Controls.Add(this.btnOpenTextFileBtn);
            this.Controls.Add(this.calculateBtn);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.strFileNameTxt);
            this.Name = "Form1";
            this.Text = "Intergalactic Transactions Calculator";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.OpenFileDialog openFileDialog1;
        private System.Windows.Forms.SaveFileDialog saveFileDialog1;
        private System.Windows.Forms.TextBox strFileNameTxt;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Button calculateBtn;
        private System.Windows.Forms.Button btnOpenTextFileBtn;
        private System.Windows.Forms.TextBox textBox1;
    }
}

