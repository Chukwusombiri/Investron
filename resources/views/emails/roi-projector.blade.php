<x-mail::message>
# User Submitted Our ROI Projector form

## User details

- **Name:** {{$data['name']}}
- **Email:** {{$data['email']}}


## Income projector details 

- **Amount intended to Invest:** ${{$data['amount']}}
- **Intended Investment rate:** {{$data['rate']}}
- **Intended Investment duration:** {{$data['duration']}}
- **Additional comment:** {{$data['comment']}}

### Administrators endeavour to get in touch with user.
</x-mail::message>
