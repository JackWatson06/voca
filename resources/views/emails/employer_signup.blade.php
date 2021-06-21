<h1>American Labor Company - Employer Contact</h1>

<p>A potential company to work with just submitted their information into the ALC website. See contact information below</p>

<br/>

<h3>Contact Information</h3>

@isset($employer['company_lead'])
    <p>Name: {{ $employer['company_lead']->fname }} {{ $employer['company_lead']->lname }}</p>
    <p>Email: {{ $employer['company_lead']->email }}</p>
    <p>Phone: {{ $employer['company_lead']->phone }}</p>
    <p>Company Name: {{ $employer['company_lead']->company_name }}</p>
    <p>Company Industry: {{ $employer['company_lead']->industry }}</p>
    <p>Company Size: {{ $employer['company_lead']->size ?? "Not Specified" }}</p>
    <p>Additional Notes: {{ $employer['company_lead']->info ?? "Not Specified" }}</p>
@endisset
