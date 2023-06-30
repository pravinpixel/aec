@component('mail::message')
    <div>
        <p>Dear {{ $details['customer']['full_name'] }},</p>
        <p>
            I hope this email finds you well. I am pleased to inform you that we have successfully completed the
            <b>{{ $details['project']['project_name'] }}</b>
            as per the agreed-upon timeline and deliverables. It gives me great pleasure to share the details of our
            accomplishments and the final outcomes of the project.
        </p>
        <p>
            Throughout the project duration, our dedicated team worked diligently to ensure that all project milestones were
            met, and we strived to exceed your expectations. Our team members collaborated effectively, utilizing their
            expertise and skills to tackle various challenges and overcome obstacles along the way.
        </p>
        <p>
            Thank you once again for your support, and please feel free to contact me directly if you have any additional
            feedback or require further assistance.
        </p>
        <div>
            Thanks,<br>
            {{ config('app.name') }}
        </div>
    </div>
@endcomponent
