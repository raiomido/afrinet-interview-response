@component('mail::message')
# Dear {{ config('app.name') }},
#### A new company has been added to the system,

<b>Name</b>: {{$company->name}},<br>

#### Here're the details of the new entry,

@component('mail::table')
| Name       | Email         | Website  |
|:------------- |:-------------|:-------- |
| {{$company->name}}      | {{$company->email}}      | {{$company->website}}      |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
