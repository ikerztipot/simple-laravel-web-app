@component('mail::message')
Hi {{$project->owner->name}},

You have created a new project!

Title: {{$project->title}}
<br>
Description: {{$project->description}}

@component('mail::button', ['url' => ''])
View
@endcomponent

Regards from the team,<br>
{{ config('app.name') }}
@endcomponent
