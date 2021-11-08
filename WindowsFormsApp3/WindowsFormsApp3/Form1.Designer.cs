namespace WindowsFormsApp3
{
    partial class Form1
    {
        /// <summary>
        /// 必需的设计器变量。
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// 清理所有正在使用的资源。
        /// </summary>
        /// <param name="disposing">如果应释放托管资源，为 true；否则为 false。</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows 窗体设计器生成的代码

        /// <summary>
        /// 设计器支持所需的方法 - 不要修改
        /// 使用代码编辑器修改此方法的内容。
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.treeViewFileList = new System.Windows.Forms.TreeView();
            this.backgroundWorker1 = new System.ComponentModel.BackgroundWorker();
            this.cmbBoxSMTP = new System.Windows.Forms.ComboBox();
            this.txtUserName = new System.Windows.Forms.TextBox();
            this.txtDisplayName = new System.Windows.Forms.TextBox();
            this.txtEmail = new System.Windows.Forms.TextBox();
            this.txtToName = new System.Windows.Forms.TextBox();
            this.txtSubject = new System.Windows.Forms.TextBox();
            this.rtxtBody = new System.Windows.Forms.TextBox();
            this.txtPassword = new System.Windows.Forms.TextBox();
            this.btnDelete = new System.Windows.Forms.Button();
            this.btnSend = new System.Windows.Forms.Button();
            this.timer1 = new System.Windows.Forms.Timer(this.components);
            this.btnAdd = new System.Windows.Forms.Button();
            this.Get = new System.Windows.Forms.Button();
            this.txtToName1 = new System.Windows.Forms.TextBox();
            this.txtEmail1 = new System.Windows.Forms.TextBox();
            this.dataGridView2 = new System.Windows.Forms.DataGridView();
            this.rtxtBody1 = new System.Windows.Forms.TextBox();
            this.txtSubject1 = new System.Windows.Forms.TextBox();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView2)).BeginInit();
            this.SuspendLayout();
            // 
            // dataGridView1
            // 
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Location = new System.Drawing.Point(11, 12);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.ReadOnly = true;
            this.dataGridView1.RowTemplate.Height = 23;
            this.dataGridView1.Size = new System.Drawing.Size(379, 150);
            this.dataGridView1.TabIndex = 1;
            // 
            // treeViewFileList
            // 
            this.treeViewFileList.Location = new System.Drawing.Point(11, 197);
            this.treeViewFileList.Name = "treeViewFileList";
            this.treeViewFileList.Size = new System.Drawing.Size(121, 97);
            this.treeViewFileList.TabIndex = 2;
            // 
            // cmbBoxSMTP
            // 
            this.cmbBoxSMTP.FormattingEnabled = true;
            this.cmbBoxSMTP.Location = new System.Drawing.Point(11, 168);
            this.cmbBoxSMTP.Name = "cmbBoxSMTP";
            this.cmbBoxSMTP.Size = new System.Drawing.Size(121, 20);
            this.cmbBoxSMTP.TabIndex = 3;
            // 
            // txtUserName
            // 
            this.txtUserName.Location = new System.Drawing.Point(138, 167);
            this.txtUserName.Name = "txtUserName";
            this.txtUserName.Size = new System.Drawing.Size(100, 21);
            this.txtUserName.TabIndex = 4;
            this.txtUserName.Text = "xy6000hlh";
            // 
            // txtDisplayName
            // 
            this.txtDisplayName.Location = new System.Drawing.Point(350, 167);
            this.txtDisplayName.Name = "txtDisplayName";
            this.txtDisplayName.Size = new System.Drawing.Size(100, 21);
            this.txtDisplayName.TabIndex = 5;
            this.txtDisplayName.Text = "公共邮箱";
            // 
            // txtEmail
            // 
            this.txtEmail.Location = new System.Drawing.Point(244, 197);
            this.txtEmail.Name = "txtEmail";
            this.txtEmail.Size = new System.Drawing.Size(100, 21);
            this.txtEmail.TabIndex = 6;
            // 
            // txtToName
            // 
            this.txtToName.Location = new System.Drawing.Point(138, 197);
            this.txtToName.Name = "txtToName";
            this.txtToName.Size = new System.Drawing.Size(100, 21);
            this.txtToName.TabIndex = 7;
            // 
            // txtSubject
            // 
            this.txtSubject.Location = new System.Drawing.Point(244, 224);
            this.txtSubject.Name = "txtSubject";
            this.txtSubject.Size = new System.Drawing.Size(100, 21);
            this.txtSubject.TabIndex = 8;
            this.txtSubject.Text = "报修主题";
            // 
            // rtxtBody
            // 
            this.rtxtBody.Location = new System.Drawing.Point(138, 224);
            this.rtxtBody.Name = "rtxtBody";
            this.rtxtBody.Size = new System.Drawing.Size(100, 21);
            this.rtxtBody.TabIndex = 9;
            // 
            // txtPassword
            // 
            this.txtPassword.Location = new System.Drawing.Point(244, 167);
            this.txtPassword.Name = "txtPassword";
            this.txtPassword.Size = new System.Drawing.Size(100, 21);
            this.txtPassword.TabIndex = 10;
            this.txtPassword.Text = "12356789xy*";
            // 
            // btnDelete
            // 
            this.btnDelete.Location = new System.Drawing.Point(83, 415);
            this.btnDelete.Name = "btnDelete";
            this.btnDelete.Size = new System.Drawing.Size(75, 23);
            this.btnDelete.TabIndex = 12;
            this.btnDelete.Text = "delete";
            this.btnDelete.UseVisualStyleBackColor = true;
            this.btnDelete.Click += new System.EventHandler(this.btnDelete_Click);
            // 
            // btnSend
            // 
            this.btnSend.Location = new System.Drawing.Point(164, 415);
            this.btnSend.Name = "btnSend";
            this.btnSend.Size = new System.Drawing.Size(75, 23);
            this.btnSend.TabIndex = 0;
            this.btnSend.Text = "send";
            this.btnSend.UseVisualStyleBackColor = true;
            this.btnSend.Click += new System.EventHandler(this.btnSend_Click);
            // 
            // timer1
            // 
            this.timer1.Enabled = true;
            this.timer1.Interval = 60000;
            this.timer1.Tick += new System.EventHandler(this.btnSend_Click);
            // 
            // btnAdd
            // 
            this.btnAdd.Location = new System.Drawing.Point(2, 415);
            this.btnAdd.Name = "btnAdd";
            this.btnAdd.Size = new System.Drawing.Size(75, 23);
            this.btnAdd.TabIndex = 13;
            this.btnAdd.Text = "add";
            this.btnAdd.UseVisualStyleBackColor = true;
            this.btnAdd.Click += new System.EventHandler(this.btnAdd_Click);
            // 
            // Get
            // 
            this.Get.Location = new System.Drawing.Point(713, 415);
            this.Get.Name = "Get";
            this.Get.Size = new System.Drawing.Size(75, 23);
            this.Get.TabIndex = 14;
            this.Get.Text = "Get";
            this.Get.UseVisualStyleBackColor = true;
            this.Get.Click += new System.EventHandler(this.Get_Click);
            // 
            // txtToName1
            // 
            this.txtToName1.Location = new System.Drawing.Point(462, 197);
            this.txtToName1.Name = "txtToName1";
            this.txtToName1.Size = new System.Drawing.Size(100, 21);
            this.txtToName1.TabIndex = 15;
            // 
            // txtEmail1
            // 
            this.txtEmail1.Location = new System.Drawing.Point(568, 197);
            this.txtEmail1.Name = "txtEmail1";
            this.txtEmail1.Size = new System.Drawing.Size(100, 21);
            this.txtEmail1.TabIndex = 16;
            // 
            // dataGridView2
            // 
            this.dataGridView2.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView2.Location = new System.Drawing.Point(397, 12);
            this.dataGridView2.Name = "dataGridView2";
            this.dataGridView2.ReadOnly = true;
            this.dataGridView2.RowTemplate.Height = 23;
            this.dataGridView2.Size = new System.Drawing.Size(391, 150);
            this.dataGridView2.TabIndex = 17;
            // 
            // rtxtBody1
            // 
            this.rtxtBody1.Location = new System.Drawing.Point(462, 224);
            this.rtxtBody1.Name = "rtxtBody1";
            this.rtxtBody1.Size = new System.Drawing.Size(100, 21);
            this.rtxtBody1.TabIndex = 18;
            // 
            // txtSubject1
            // 
            this.txtSubject1.Location = new System.Drawing.Point(568, 224);
            this.txtSubject1.Name = "txtSubject1";
            this.txtSubject1.Size = new System.Drawing.Size(100, 21);
            this.txtSubject1.TabIndex = 19;
            this.txtSubject1.Text = "回复主题";
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 12F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(800, 450);
            this.Controls.Add(this.txtSubject1);
            this.Controls.Add(this.rtxtBody1);
            this.Controls.Add(this.dataGridView2);
            this.Controls.Add(this.txtEmail1);
            this.Controls.Add(this.txtToName1);
            this.Controls.Add(this.Get);
            this.Controls.Add(this.btnAdd);
            this.Controls.Add(this.btnSend);
            this.Controls.Add(this.btnDelete);
            this.Controls.Add(this.txtPassword);
            this.Controls.Add(this.rtxtBody);
            this.Controls.Add(this.txtSubject);
            this.Controls.Add(this.txtToName);
            this.Controls.Add(this.txtEmail);
            this.Controls.Add(this.txtDisplayName);
            this.Controls.Add(this.txtUserName);
            this.Controls.Add(this.cmbBoxSMTP);
            this.Controls.Add(this.treeViewFileList);
            this.Controls.Add(this.dataGridView1);
            this.Cursor = System.Windows.Forms.Cursors.Hand;
            this.Name = "Form1";
            this.Text = "Form1";
            this.Load += new System.EventHandler(this.Form1_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView2)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion
        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.TreeView treeViewFileList;
        private System.ComponentModel.BackgroundWorker backgroundWorker1;
        private System.Windows.Forms.ComboBox cmbBoxSMTP;
        private System.Windows.Forms.TextBox txtUserName;
        private System.Windows.Forms.TextBox txtDisplayName;
        private System.Windows.Forms.TextBox txtEmail;
        private System.Windows.Forms.TextBox txtToName;
        private System.Windows.Forms.TextBox txtSubject;
        private System.Windows.Forms.TextBox rtxtBody;
        private System.Windows.Forms.TextBox txtPassword;
        private System.Windows.Forms.Button btnDelete;
        private System.Windows.Forms.Button btnSend;
        private System.Windows.Forms.Timer timer1;
        private System.Windows.Forms.Button btnAdd;
        private System.Windows.Forms.Button Get;
        private System.Windows.Forms.TextBox txtToName1;
        private System.Windows.Forms.TextBox txtEmail1;
        private System.Windows.Forms.DataGridView dataGridView2;
        private System.Windows.Forms.TextBox rtxtBody1;
        private System.Windows.Forms.TextBox txtSubject1;
    }
}

