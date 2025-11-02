<?php

require __DIR__ . "/vendor/autoload.php";

use Postmark\PostmarkClient;
use Postmark\Models\PostmarkAttachment;
use Postmark\Models\PostmarkException;

$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST['number']
$subject = $_POST["subject"];
$body = $_POST["body"];

$file_path = $_FILES["file"]["tmp_name"];
$file_name = $_FILES["file"]["name"];
$file_type = mime_content_type($file_path);

if ( ! is_uploaded_file($file_path)) {

    throw new UnexpectedValueException("Invalid file");

}

try {

    $client = new PostmarkClient("postmark API key here");

    $attachment = PostmarkAttachment::fromFile($file_path,
                                               $file_name,
                                               $file_type);

    $result = $client->sendEmail(
        from: "Name <example@example.com>",
        to: "$name <$email>",
        subject: $subject,
        htmlBody: $body,
        textBody: strip_tags($body),
        attachments: [$attachment]
    );

    echo "Message sent.";

} catch (PostmarkException $e) {

    echo $e->message;

} catch (Exception $e) {

    echo $e->getMessage();

}