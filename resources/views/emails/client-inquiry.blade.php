<x-mail::message>
# {{$subject}}
Below are the details of the client inquiry: 

### CLIENT FULLNAME
{{$mailData['first_name'].' '.$mailData['last_name']}}


### CLIENT EMAIL ADDRESS
{{$mailData['email']}}


### CLIENT PHONE
{{$mailData['phone']}}


### CLIENT ZIPCODE
{{$mailData['zip_code']}}


### CLIENT NEED
{{$mailData['client_need']}}


### CLIENT INVESTABLE ASSET
{{$mailData['investable_asset']}}


### ADVISOR REEQUESTED
{{$mailData['advisor'] ?? 'None'}}


### FOLLOW-UP CONVERSATION STATUS 
{{$mailData['wants_to_talk']}}


### CLIENT COMMENT
{{$mailData['comment']}}

</x-mail::message>