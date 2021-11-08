using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

using System.Net.Mail;
using System.Net.Mime;
using System.Net;
using System.IO;
using MySql.Data;
using MySql.Data.MySqlClient;


namespace WindowsFormsApp3
{
    public partial class Form1 : Form
    {

        MySqlConnection conn = new MySqlConnection("server=localhost;port=3306;user=root;password=root; database=hisense;charset=gb2312;");
        public Form1()
        {
            InitializeComponent();
            this.ImeMode = ImeMode.Hangul;
        }

        //删除
        private void btnDelete_Click(object sender, EventArgs e)
        {
            //判断是否选中了节点
            if (treeViewFileList.SelectedNode != null)
            {
                //得到选择的节点
                TreeNode tempNode = treeViewFileList.SelectedNode;
                //删除选中的节点
                treeViewFileList.Nodes.Remove(tempNode);
            }
            else
            {
                MessageBox.Show("请选择要删除的附件。");
            }
        }
        


        //发送
        private void btnSend_Click(object sender, EventArgs e)
        {
            string str = "select * from baoxiu where send='否' order by id desc limit 1";
            MySqlDataAdapter da = new MySqlDataAdapter();       // 实例化sqldataadpter
            MySqlCommand cmd1 = new MySqlCommand(str, conn);     //sql语句
            da.SelectCommand = cmd1;            // 设置为已实例化SqlDataAdapter的查询命令
                                                //DataSet ds1 = new DataSet();      
                                                // 实例化dataset
            DataTable ds1 = new DataTable();
            da.Fill(ds1);                       // 把数据填充到dataset
                                                // listBox1.Items.Add(ds1.ToString()); 
                                                // 将数据集绑定datagridview,完成显示
            dataGridView1.DataSource = ds1;//把数据绑定到data
            if (dataGridView1.Rows.Count > 1)
            {

                //定义并初始化一个OpenFileDialog类的对象
                if (treeViewFileList.Nodes.Count == 1)
                {
                    treeViewFileList.Nodes[0].Remove();
                }
                try
                {
                    OpenFileDialog openFile = new OpenFileDialog();
                    openFile.InitialDirectory = Application.StartupPath;
                    string file = dataGridView1.CurrentRow.Cells[10].Value.ToString();
                    openFile.FileName = file;
                    openFile.RestoreDirectory = true;
                    openFile.Multiselect = false;

                    //得到选择的文件名
                    string fileName = openFile.FileName;
                    //将文件名添加到TreeView中
                    treeViewFileList.Nodes.Add(fileName);
                    txtEmail.Text = "linhongliang@hisense.com";
                    txtToName.Text = dataGridView1.CurrentRow.Cells[1].Value.ToString();
                    rtxtBody.Text = dataGridView1.CurrentRow.Cells[3].Value.ToString() + "," + dataGridView1.CurrentRow.Cells[1].Value.ToString() + "的" + dataGridView1.CurrentRow.Cells[6].Value.ToString() + "(" + dataGridView1.CurrentRow.Cells[5].Value.ToString() + ")" + "故障原因" + dataGridView1.CurrentRow.Cells[8].Value.ToString();
                    //确定smtp服务器地址。实例化一个Smtp客户端
                    System.Net.Mail.SmtpClient client = new System.Net.Mail.SmtpClient(cmbBoxSMTP.Text);
                    //生成一个发送地址
                    string strFrom = string.Empty;
                    strFrom = txtUserName.Text + "@126.com";
                    //构造一个发件人地址对象
                    MailAddress from = new MailAddress(strFrom, txtDisplayName.Text, Encoding.UTF8);
                    //构造一个收件人地址对象
                    MailAddress to = new MailAddress(txtEmail.Text, txtToName.Text, Encoding.UTF8);

                    //构造一个Email的Message对象
                    MailMessage message = new MailMessage(from, to);

                    //为 message 添加附件
                    foreach (TreeNode treeNode in treeViewFileList.Nodes)
                    {

                        //判断文件是否存在
                        if (File.Exists(fileName))
                        {
                            //构造一个附件对象
                            Attachment attach = new Attachment(fileName);
                            //得到文件的信息
                            ContentDisposition disposition = attach.ContentDisposition;
                            disposition.CreationDate = System.IO.File.GetCreationTime(fileName);
                            disposition.ModificationDate = System.IO.File.GetLastWriteTime(fileName);
                            disposition.ReadDate = System.IO.File.GetLastAccessTime(fileName);
                            //向邮件添加附件
                            message.Attachments.Add(attach);
                        }

                    }

                    //添加邮件主题和内容
                    message.Subject = txtSubject.Text;
                    message.SubjectEncoding = Encoding.UTF8;
                    message.Body = rtxtBody.Text;
                    message.BodyEncoding = Encoding.UTF8;

                    //设置邮件的信息
                    client.DeliveryMethod = SmtpDeliveryMethod.Network;
                    message.BodyEncoding = System.Text.Encoding.UTF8;
                    message.IsBodyHtml = false;

                    //如果服务器支持安全连接，则将安全连接设为true。
                    //gmail支持，163不支持，如果是gmail则一定要将其设为true
                    if (cmbBoxSMTP.SelectedText == "smtp.126.com")
                        client.EnableSsl = false;

                    //设置用户名和密码。
                    //string userState = message.Subject;
                    client.UseDefaultCredentials = false;
                    string username = txtUserName.Text;
                    string passwd = txtPassword.Text;
                    //用户登陆信息
                    NetworkCredential myCredentials = new NetworkCredential(username, passwd);
                    client.Credentials = myCredentials;
                    //发送邮件
                    client.Send(message);
                    string id = dataGridView1.CurrentRow.Cells[0].Value.ToString();
                    string str2 = "update baoxiu set send='是' where id='" + id + "' ";
                    MySqlCommand cmd2 = new MySqlCommand(str2, conn);
                    DataTable ds2 = new DataTable();
                    da.SelectCommand = cmd2;
                    da.Fill(ds2);
                }
                catch (Exception ex)
                {
                    MessageBox.Show(ex.Message);
                }
            }
            string str3 = "select * from baoxiu where slqk='已完成' and send='是' order by id desc limit 1";
            MySqlCommand cmd3 = new MySqlCommand(str3, conn);     //sql语句
            da.SelectCommand = cmd3;            // 设置为已实例化SqlDataAdapter的查询命令
            DataTable ds3 = new DataTable();
            da.Fill(ds3);
            dataGridView2.DataSource = ds3;
            if (dataGridView2.Rows.Count > 1)
            {

                //定义并初始化一个OpenFileDialog类的对象
                try
                {
                    txtEmail1.Text = dataGridView2.CurrentRow.Cells[4].Value.ToString();
                    txtToName1.Text = dataGridView2.CurrentRow.Cells[1].Value.ToString();
                    rtxtBody1.Text = dataGridView2.CurrentRow.Cells[5].Value.ToString() + dataGridView2.CurrentRow.Cells[6].Value.ToString() + "已修复，请及时领取！";
                    //确定smtp服务器地址。实例化一个Smtp客户端
                    System.Net.Mail.SmtpClient client = new System.Net.Mail.SmtpClient(cmbBoxSMTP.Text);
                    //生成一个发送地址
                    string strFrom = string.Empty;
                    strFrom = txtUserName.Text + "@126.com";
                    //构造一个发件人地址对象
                    MailAddress from = new MailAddress(strFrom, txtDisplayName.Text, Encoding.UTF8);
                    //构造一个收件人地址对象
                    MailAddress to = new MailAddress(txtEmail1.Text, txtToName1.Text, Encoding.UTF8);

                    //构造一个Email的Message对象
                    MailMessage message = new MailMessage(from, to);

                    //为 message 添加附件
                    /*foreach (TreeNode treeNode in treeViewFileList.Nodes)
                    {
                    }*/

                    //添加邮件主题和内容
                    message.Subject = txtSubject1.Text;
                    message.SubjectEncoding = Encoding.UTF8;
                    message.Body = rtxtBody1.Text;
                    message.BodyEncoding = Encoding.UTF8;

                    //设置邮件的信息
                    client.DeliveryMethod = SmtpDeliveryMethod.Network;
                    message.BodyEncoding = System.Text.Encoding.UTF8;
                    message.IsBodyHtml = false;

                    //如果服务器支持安全连接，则将安全连接设为true。
                    //gmail支持，163不支持，如果是gmail则一定要将其设为true
                    if (cmbBoxSMTP.SelectedText == "smtp.126.com")
                        client.EnableSsl = false;

                    //设置用户名和密码。
                    //string userState = message.Subject;
                    client.UseDefaultCredentials = false;
                    string username = txtUserName.Text;
                    string passwd = txtPassword.Text;
                    //用户登陆信息
                    NetworkCredential myCredentials = new NetworkCredential(username, passwd);
                    client.Credentials = myCredentials;
                    //发送邮件
                    client.Send(message);
                    string id = dataGridView2.CurrentRow.Cells[0].Value.ToString();
                    string str2 = "update baoxiu set send='已回复' where id='" + id + "' ";
                    MySqlCommand cmd2 = new MySqlCommand(str2, conn);
                    DataTable ds2 = new DataTable();
                    da.SelectCommand = cmd2;
                    da.Fill(ds2);

                }
                catch (Exception ex)
                {
                    MessageBox.Show(ex.Message);
                }
            }
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            //添加俩个smtp服务器的名称
            cmbBoxSMTP.Items.Add("smtp.126.com");

            //设置为下拉列表
            cmbBoxSMTP.DropDownStyle = ComboBoxStyle.DropDownList;
            //默认选中第一个选项
            cmbBoxSMTP.SelectedIndex = 0;
            //在下面添加你想要初始化的内容，比如显示姓名、用户名等
            string str = "select * from baoxiu where send='否' order by id desc limit 1";
            MySqlDataAdapter da = new MySqlDataAdapter();       // 实例化sqldataadpter
            MySqlCommand cmd1 = new MySqlCommand(str, conn);     //sql语句
            da.SelectCommand = cmd1;            // 设置为已实例化SqlDataAdapter的查询命令
                                                //DataSet ds1 = new DataSet();       // 实例化dataset
            DataTable ds1 = new DataTable();
            da.Fill(ds1);                       // 把数据填充到dataset
                                                // listBox1.Items.Add(ds1.ToString());  // 将数据集绑定datagridview,完成显示
            dataGridView1.DataSource = ds1;//把数据绑定到data

        }

        private void btnAdd_Click(object sender, EventArgs e)
        {
            //定义并初始化一个OpenFileDialog类的对象
            OpenFileDialog openFile = new OpenFileDialog();
            openFile.InitialDirectory = Application.StartupPath;
            openFile.FileName = "";
            openFile.RestoreDirectory = true;
            openFile.Multiselect = false;

            //显示打开文件对话框，并判断是否单击了确定按钮
            if (openFile.ShowDialog() == DialogResult.OK)
            {
                //得到选择的文件名
                string fileName = openFile.FileName;
                //将文件名添加到TreeView中
                treeViewFileList.Nodes.Add(fileName);
            }
        }

        private void Get_Click(object sender, EventArgs e)
        {

        }
        //回复
        /*private void Get_Click(object sender, EventArgs e)
        {
            string str = "select * from baoxiu where slqk='已完成' and send='是' order by id desc limit 1";
            MySqlDataAdapter da = new MySqlDataAdapter();       // 实例化sqldataadpter
            MySqlCommand cmd1 = new MySqlCommand(str, conn);     //sql语句
            da.SelectCommand = cmd1;            // 设置为已实例化SqlDataAdapter的查询命令
                                                //DataSet ds1 = new DataSet();      
                                                // 实例化dataset
            DataTable ds1 = new DataTable();
            da.Fill(ds1);
            dataGridView2.DataSource = ds1;
            if (dataGridView2.Rows.Count > 1)
            {

                //定义并初始化一个OpenFileDialog类的对象
                try
                {
                    txtEmail1.Text = dataGridView2.CurrentRow.Cells[4].Value.ToString();
                    txtToName1.Text = dataGridView2.CurrentRow.Cells[1].Value.ToString();
                    rtxtBody1.Text = dataGridView2.CurrentRow.Cells[6].Value.ToString()+"已修复，请及时领取！";
                    //确定smtp服务器地址。实例化一个Smtp客户端
                    System.Net.Mail.SmtpClient client = new System.Net.Mail.SmtpClient(cmbBoxSMTP.Text);
                    //生成一个发送地址
                    string strFrom = string.Empty;
                    strFrom = txtUserName.Text + "@126.com";
                    //构造一个发件人地址对象
                    MailAddress from = new MailAddress(strFrom, txtDisplayName.Text, Encoding.UTF8);
                    //构造一个收件人地址对象
                    MailAddress to = new MailAddress(txtEmail1.Text, txtToName1.Text, Encoding.UTF8);

                    //构造一个Email的Message对象
                    MailMessage message = new MailMessage(from, to);

                    //为 message 添加附件
                    foreach (TreeNode treeNode in treeViewFileList.Nodes)
                    {
                    }

                    //添加邮件主题和内容
                    message.Subject = txtSubject1.Text;
                    message.SubjectEncoding = Encoding.UTF8;
                    message.Body = rtxtBody1.Text;
                    message.BodyEncoding = Encoding.UTF8;

                    //设置邮件的信息
                    client.DeliveryMethod = SmtpDeliveryMethod.Network;
                    message.BodyEncoding = System.Text.Encoding.UTF8;
                    message.IsBodyHtml = false;

                    //如果服务器支持安全连接，则将安全连接设为true。
                    //gmail支持，163不支持，如果是gmail则一定要将其设为true
                    if (cmbBoxSMTP.SelectedText == "smtp.126.com")
                        client.EnableSsl = false;

                    //设置用户名和密码。
                    //string userState = message.Subject;
                    client.UseDefaultCredentials = false;
                    string username = txtUserName.Text;
                    string passwd = txtPassword.Text;
                    //用户登陆信息
                    NetworkCredential myCredentials = new NetworkCredential(username, passwd);
                    client.Credentials = myCredentials;
                    //发送邮件
                    client.Send(message);
                    string id = dataGridView2.CurrentRow.Cells[0].Value.ToString();
                    string str2 = "update baoxiu set send='已回复' where id='" + id + "' ";
                    MySqlCommand cmd2 = new MySqlCommand(str2, conn);
                    DataTable ds2 = new DataTable();
                    da.SelectCommand = cmd2;
                    da.Fill(ds2);

                }
                catch (Exception ex)
                {
                    MessageBox.Show(ex.Message);
                }
            }
        }*/
    }
}
