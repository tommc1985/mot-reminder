Problem sending SMS Message.

Message
===============
{{ $errorMessage }}

Reminder Object
===============
ID: {{ $reminder->id }}
MOT ID: {{ $reminder->mot->id }}
First Name: {{ $reminder->mot->first_name }}
Last Name: {{ $reminder->mot->last_name }}
Phone Number: {{ $reminder->mot->phone_number }}

Message
===============
{{ $messageBody }}
{{ strlen($messageBody) }} chars