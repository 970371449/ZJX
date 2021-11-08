using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Mail;

namespace WindowsFormsApp3
{
    class Class1
    {
        public string SendMail(string from, string fromname, string to, string subject, string body, string username, string password, string server)
        {
            try
            {
                //邮件发送类
                MailMessage mail = new MailMessage();
                //是谁发送的邮件
                mail.From = new MailAddress(from, fromname);
                //发送给谁
                mail.To.Add(to);
                //标题
                mail.Subject = subject;
                //内容编码
                mail.BodyEncoding = Encoding.Default;
                //发送优先级
                mail.Priority = MailPriority.High;
                //邮件内容
                mail.Body = body;
                //是否HTML形式发送
                mail.IsBodyHtml = true;
                //附件
                /*for (int i = 0; i < fujian.Length; i++)
                {
                    mail.Attachments.Add(new Attachment(fujian[i]));
                }*/
                //邮件服务器和端口
                SmtpClient smtp = new SmtpClient(server, 25);
                smtp.UseDefaultCredentials = true;
                //指定发送方式
                smtp.DeliveryMethod = SmtpDeliveryMethod.Network;
                //指定登录名和密码
                smtp.Credentials = new System.Net.NetworkCredential(username, password);
                //超时时间
                smtp.Timeout = 10000;
                smtp.Send(mail);
                return "send ok";
            }
            catch (Exception exp)
            {
                return exp.Message;
            }
        }
    }
}
