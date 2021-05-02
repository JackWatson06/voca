<h1>American Labor Company - Employer Contact</h1>

<p>A potential company to work with just submitted their information into the ALC website. See contact information below</p>

<br/>

<h3>Contact Information</h3>

@isset($employer['user'])
    <p>Name: {{ $employer['user']->name }}</p>
    <p>Email: {{ $employer['user']->email }}</p>
    <p>Phone: {{ $employer['user']->phone }}</p>
@endisset

@isset($employer['company'])
    <p>Company Name: {{ $employer['company']->name }}</p>
    <p>Company Industry: {{ $employer['company']->industry }}</p>
    <p>Company Size: {{ $employer['company']->size ?? "Not Specified" }}</p>
    <p>Additional Notes: {{ $employer['company']->info ?? "Not Specified" }}</p>
@endisset
