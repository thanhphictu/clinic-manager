<?php

namespace Controllers;

use lib\DController;
use Models\AllcodesModel;
use Models\BookingModel;
use Models\UsersModel;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class AppointmentController extends DController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if (!isset($_SESSION['userLogin'])) {
            header('Location: ' . BASE_URL . 'LoginController');
        } else {
            $this->appointmentPage();
        }
    }
    public function appointmentPage()
    {
        $timeAllcode = AllcodesModel::where('type', 'TIME')
            ->get();
        $positionAllcode = AllcodesModel::where('type', 'POSITION')
            ->get();

        $this->load->viewAdmin("sidebarAdmin", null);
        $this->load->viewAdmin("headerAdmin", null);
        $this->render("admin.appointmentPage", [
            'timeAllcode' => $timeAllcode,
            'positionAllcode' => $positionAllcode
        ]);
        $this->render("admin.infoDoctor", []);
        $this->load->viewAdmin("infoDoctorEnd", null);
        $this->load->viewAdmin("footerAdmin", null);
    }
    public function selectSpeciality()
    {
        $timeAllcode = AllcodesModel::where('type', 'TIME')
            ->get();
        if (isset($_POST['position'])) {
            $data = UsersModel::where('positionid', $_POST['position'])
                ->get();
            $this->render("admin.infoDoctor", [
                'data' => $data
            ]);
        }
    }
    public function handleFormAppointment()
    {
        if (
            isset($_POST['customerName']) && isset($_POST['customerEmail']) &&
            isset($_POST['date']) && isset($_POST['timetype']) &&
            isset($_POST['note']) && isset($_POST['positionid']) &&
            isset($_POST['doctorid']) &&
            $_POST['customerName'] && $_POST['customerEmail'] &&
            $_POST['date'] && $_POST['timetype'] &&
            $_POST['note'] && $_POST['positionid'] &&
            $_POST['doctorid']
        ) {
            $data = $_POST;
            $bookingModel = new BookingModel();
            $bookingModel->fill($data);
            $bookingModel->status = 'S1';
            $token = bin2hex(random_bytes(8));
            $bookingModel->token = $token;

            $bookingModeldate = BookingModel::where('date', $_POST['date'])
                ->where('timetype', $_POST['timetype'])
                ->where('doctorid', $_POST['doctorid'])
                ->first();

            if ($bookingModeldate) {
                echo '
                <div class="msg-content-user" 
                    style="font-size: 23px; font-weight: 600; color: #bf0000;">
                        Bác sĩ này đã có lịch hẹn trùng với thời gian bạn chọn</br>
                        Vui lòng chọn bác sĩ khác hoặc thời gian khác.
                    </div>  
                
                ';
            } else {
                $bookingModel->save();

                $timeApm = AllcodesModel::where('keymap', $_POST['timetype'])->first();
                $doctor = UsersModel::find($_POST['doctorid']);


                if ($bookingModel->save() == 1) {
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);
                    try {
                        //Server settings
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = USER_MAILER;                     //SMTP username
                        $mail->Password   = PASSWORD_MAILER;                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom(USER_MAILER, 'TAMKECARE');
                        $mail->addAddress($_POST['customerEmail'], $_POST['customerName']);     //Add a recipient



                        //Attachments
                        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Thank you for trusting';
                        $mail->Body    = '

                    <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
                        <center style="width: 100%; background-color: #ffff;">
                        <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
                            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                        </div>
                        <div style="max-width: 600px; margin: 0 auto;" class="email-container">
                            <!-- BEGIN BODY -->
                            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                                <tr>
                                <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td class="logo" style="text-align: center;">
                                            <h1><a href="#">' . NAME_WEBSITE . '</a></h1>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                </tr><!-- end tr -->
                                <tr>
                                <td valign="middle" class="hero bg_white" style="padding: 3em 0 2em 0;">
                                <img src="https://colorlib.com/etc/email-template/10/images/email.png" alt="" style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;">
                                </td>
                                </tr>
                                <!-- end tr -->
                                    <tr>
                                <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
                                <table style="margin: 0 auto">
                                    <tr>
                                        <td>
                                            <div class="text" style="padding: 0 2.5em; text-align: center;">
                                                <h2>Bạn đã dặt lịch hẹn thành công</h2>
                                                <h3>Thật tuyệt vời khi chúng tôi nhận được lịch hẹn của <span style="font-size: 1.25em;">' . $_POST['customerName'] . '</span></h3>
                                                <h3>Lịch hẹn của bạn vào lúc <span style="font-size: 1.25em;">' . $timeApm->value . '</span>  ngày <span style="font-size: 1.25em;">' . $_POST['date'] . '</span></h3>
                                                <h3>Bác sĩ bạn đã đặt lịch hẹn: <span style="font-size: 1.25em;">' .  $doctor->lastName . '  ' . $doctor->firstName . '</span></h3>
                                                <h3>Lý do: <span style="font-size: 1.25em;">' . $_POST['note'] . '</span></h3>
                                                <p style="margin-top: 25px;">
                                                    <a href="' . BASE_URL . 'AppointmentController/verifytoken?token=' . $token . '&doctorid=' . $_POST['doctorid'] . '" class="btn btn-primary"
                                                    style=" padding: 15px;
                                                            border-radius: 5px;
                                                            background: #30e3ca;
                                                            color: #000000;
                                                            font-weight: 600;
                                                            font-size: 14px;"
                                                    >
                                                        Ấn Vào đây để xác nhận
                                                    </a>
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                </td>
                                </tr><!-- end tr -->


                        </div>
                        </center>
                    </body>

                    ';
                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                    } catch (Exception $e) {
                        echo "Email của bạn không chính xác: {$mail->ErrorInfo}";
                    }

                    echo '
                        <div class="msg-content-user" 
                        style="font-size: 23px; font-weight: 600; color: var(--main-sidebar);">
                            Đặt lịch khám thành công !! </br>
                            Vui lòng kiểm tra email.
                        </div>

                    ';
                } else {
                    echo '
                            <div class="msg-content-user" 
                            style="font-size: 23px; font-weight: 600; color: #bf0000;">
                                Vui lòng kiểm tra lại thông tin ¬¬
                            </div>  

                        ';
                }
            }
        } else {
            echo '
            <div class="msg-content-user" 
            style="font-size: 23px; font-weight: 600; color: #bf0000;">
                Vui lòng nhập đầy đủ thông tin ¬¬
            </div>  

        ';
        }
    }
    public function verifytoken()
    {
        if (isset($_GET['token']) && isset($_GET['doctorid'])) {

            $bookingModel = BookingModel::where([
                'token' => $_GET['token'],
                'doctorid' => $_GET['doctorid'],
            ])->first();
            $bookingModel->status = 'S2';
            $bookingModel->save();

            echo '<h1>Xác nhận thành công</h1>';
            echo '<a href="' . BASE_URL . '">Quay về trang chủ</a>';
        }
    }
}
