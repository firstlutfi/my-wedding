@component('mail::message')

Dear Lutfi & Vira,

<b>{{ $guest_name }}</b> have responded <b>{{ $rsvp }}</b> to your invitation{!! $rsvp == "yes" ? ", he/she will come in a group of <b>$number_of_attendance people</b>" : "" !!}.
Check the dashboard for more details.

Thanks.
@endcomponent