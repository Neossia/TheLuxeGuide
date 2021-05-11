<?php

/**
 * @file
 * Implements Drupal MailSystemInterface.
 */

/**
 * SendInBlue class.
 */
class SibMs implements MailSystemInterface {
  /**
   * The request url of Sendinblue api.
   */
  const API_URL = 'https://api.sendinblue.com/v2.0';

  /**
   * Variable name of Sendinblue access key.
   */
  const ACCESS_KEY = 'sendinblue_access_key';

  /**
   * Variable name of Sendinblue account email.
   */
  const ACCOUNT_EMAIL = 'sendinblue_account_email';

  /**
   * Variable name of Sendinblue account user name.
   */
  const ACCOUNT_USERNAME = 'sendinblue_account_username';

  /**
   * Email formatting, example strip away html.
   *
   * @param array $message
   *   : Message array.
   *
   * @return array
   *   : Formatted message array.
   */
  public function format(array $message) {
    // Join message array.
    $message['body'] = implode("\n\n", $message['body']);
    return $message;
  }

  /**
   * Implement mail method to send mail via Sendgrid.
   *
   * @param array $message
   *   : Message array.
   *
   * @return bool
   *   : True on success.
   */
  public function mail(array $message) {
    $to = [$message['to'] => ''];
    $subject = $message['subject'];
    $html = $message['body'];
    $text = "";
    $attachment = $message['params']['attachments'];
    $headers = $message['headers'];

    $cc = array();
    $bcc = array();

    if ($message['params']['cc']) {
      $ccs = explode(',', $message['params']['cc']);
      foreach ($ccs as $value) {
        $cc[trim($value)] = "";
      }
    }
    if ($message['params']['bcc']) {
      $bccs = explode(',', $message['params']['bcc']);
      foreach ($bccs as $mail) {
        $bcc[trim($mail)] = "";
      }
    }
    $access_key = variable_get(self::ACCESS_KEY, '');
    $mailin = new SendinblueMailin(self::API_URL, $access_key);
    $sender_email = variable_get(self::ACCOUNT_EMAIL, '');
    $sender_name = variable_get(self::ACCOUNT_USERNAME, '');
    $from = array($sender_email, $sender_name);

    $headers['From'] = "$sender_name <$sender_email>";

    $response = $mailin->sendEmail($to, $subject, $from, $html, $text, $cc, $bcc, $from, $attachment, $headers);

    if ($response['code'] == 'success') {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

}
