<?php 
class Email extends CI_Controller {

    protected $currentUserId;
    public function __construct()
    {
      parent::__construct();
      $this->load->library('session');
      $this->load->library('authenticate');
      $this->load->library('viewengine');
      $this->load->model("auth_model");
      $this->load->model("bank_model");
      $this->load->model("payment_model");
      $this->load->model("help_model");
      
      $this->authenticate->checkLogInState();
      $this->authenticate->verifyUserType();
      $this->currentUserId = $this->session->userdata['user_id'];
    }

    public function send(){
      $config = Array(
          'useragent' => "CodeIgniter",
          'mailpath' => "/usr/bin/sendmail",
          'protocol' => 'smtp',
          'smtp_host' => 'smtp.umstraininghub.com',
          'smtp_port' => 465,
          'smtp_user' => 'umstraininghubcom',
          'smtp_pass' => 'Jg%!&b@L0821g&Jh!@10',
          'mailtype'  => 'html', 
          'charset'   => 'iso-8859-1'
      );
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");

      $this->email->from('noreply@payroll100.com', 'Payroll100');
      $this->email->to('williamscalg@gmail.com'); 

      $this->email->subject('Email Test');
      $this->email->message('<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Riby Peer Lending</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/fonts/ionicons.eot" media="screen" title="no title">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/fonts/ionicons.svg" media="screen" title="no title">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/fonts/ionicons.ttf" media="screen" title="no title">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/fonts/ionicons.woff" media="screen" title="no title">
    <style type="text/css">
    /* -------------------------------------
        INLINED WITH https://putsmail.com/inliner
    ------------------------------------- */
    /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
    ------------------------------------- */
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important; }
      table[class=body] p,
      table[class=body] ul,
      table[class=body] ol,
      table[class=body] td,
      table[class=body] span,
      table[class=body] a {
        font-size: 16px !important; }
      table[class=body] .wrapper,
      table[class=body] .article {
        padding: 10px !important; }
      table[class=body] .content {
        padding: 0 !important; }
      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important; }
      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important; }
      table[class=body] .btn table {
        width: 100% !important; }
      table[class=body] .btn a {
        width: 100% !important; }
      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important; }}
    /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
    ------------------------------------- */
    @media all {
      .ExternalClass {
        width: 100%; }
      .ExternalClass,
      .ExternalClass p,
      .ExternalClass span,
      .ExternalClass font,
      .ExternalClass td,
      .ExternalClass div {
        line-height: 100%; }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important; }
      .btn-primary table td:hover {
        background-color: #34495e !important; }
      .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important; } }
      .icon {
        font-size: 20px;
      }
    </style>
  </head>
  <body class="" style="background-color:#f6f6f6;font-family:sans-serif;-webkit-font-smoothing:antialiased;font-size:14px;line-height:1.4;margin:0;padding:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background-color:#f6f6f6;width:100%;">
      <tr>
        <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
        <td class="container" style="font-family:sans-serif;font-size:14px;vertical-align:top;display:block;max-width:580px;padding:10px;width:580px;Margin:0 auto !important;">
          <div class="content" style="box-sizing:border-box;display:block;Margin:0 auto;max-width:580px;padding:10px;">
            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader" style="color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width:0;">Riby Peerlending - Incoming Notification</span>
            <table class="main" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background:#fff;border-radius:3px;width:100%;">
              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family:sans-serif;font-size:14px;vertical-align:top;box-sizing:border-box;padding:20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;">
                    <tr>
                      <td style="background-color:none; padding-left:0px; padding: 9px;">
                        <!-- <td style="background-color:rgba(254,82,76, .9); padding: 9px;"> -->
                        <a  href="http://peerlending.riby.me"></a>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-family:sans-serif;font-size:14px;vertical-align:top;padding-top: 5px; ">
                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">Dear <?= $username?></p>
                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;"><?= $msg ?></p>
                        
                          <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;"><?php $message->attach($loan_note_url) ?></p>
                        <?php endif; ?>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;box-sizing:border-box;width:100%;">
                          <tbody>
                            <tr>
                              <td align="left" style="font-family:sans-serif;font-size:14px;vertical-align:top;padding-bottom:15px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;width:auto;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family:sans-serif;font-size:14px;vertical-align:top;background-color:#ffffff;border-radius:5px;text-align:center;background-color:#3498db;"> <a href="http://peerlending.riby.me" target="_blank" style="text-decoration:underline;background-color:#ffffff;border:solid 1px #3498db;border-radius:5px;box-sizing:border-box;color:#3498db;cursor:pointer;display:inline-block;font-size:14px;font-weight:bold;margin:0;padding:12px 25px;text-decoration:none;text-transform:capitalize;background-color:#3498db;border-color:#3498db;color:#ffffff;">Goto Peerlending</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">Thank you for using Riby Peer Lending System <br>
                        Powered by Team RibyFinance<br></p>
                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">P.S Kindly add <a href="<?=$email_from?>" style="color:#aaa"><?=$email_from?></a> to your address book to ensure that you receive our messages (no spam, we promise!).</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- START FOOTER -->
            <div class="footer" style="clear:both;padding-top:10px;text-align:center;width:100%;">
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;">
                <tr>
                  <td class="content-block" style="font-family:sans-serif;font-size:14px;vertical-align:top;color:#999999;font-size:12px;text-align:center;">
                    <span class="apple-link" style="color:#999999;font-size:12px;text-align:center;"><b>Call us On: 01 291 4247 Email us: peerlending@riby.me</b></span><br>
                    <span class="apple-link" style="color:#999999;font-size:12px;text-align:center;">70 Olonode Street Alago-meji Yaba, Lagos Nigeria.</span>
                    <br>
                    <span class="apple-link" style="color:#999999;font-size:12px;text-align:center;"><a href="https://twitter.com/Ribyfinance"><i class="ionicons ion-social-twitter-outline icon"></i></a> <a href="https://www.facebook.com/profile.php?id=100009508510846"><i class="ionicons ion-social-facebook-outline icon"></i></a> <a href="https://www.linkedin.com/company/riby-finance"><i class="ionicons ion-social-linkedin-outline icon"></i></a> </span></td>
                </tr>
                <tr>
                  <td class="content-block powered-by" style="font-family:sans-serif;font-size:14px;vertical-align:top;color:#999999;font-size:12px;text-align:center;">
                    Powered by <a href="http://www.riby.me" style="color:#3498db;text-decoration:underline;color:#999999;font-size:12px;text-align:center;text-decoration:none;">Riby Finance</a>.
                    <br>
                    Finance Life Techonology &copy; 2016
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->
            <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>');  

      $this->email->send();

      echo $this->email->print_debugger();

      $result = $this->email->send();
      print_r($result);
    }
}
?>