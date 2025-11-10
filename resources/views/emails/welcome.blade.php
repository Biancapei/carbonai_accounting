<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CarbonAI</title>
</head>
<body style="margin:0;padding:0;background-color:#f3f4f6;font-family:'Montserrat','Inter','Segoe UI',Arial,sans-serif;color:#0f172a;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f3f4f6;padding:40px 0;border-spacing:0;border-collapse:collapse;">
        <tr>
            <td align="center">
                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="max-width:580px;background:#ffffff;border:1px solid rgba(15,23,42,0.08);border-radius:24px;overflow:hidden;box-shadow:0 18px 40px rgba(15,23,42,0.12);border-spacing:0;border-collapse:collapse;">
                    <tr>
                        <td style="padding:48px 44px 36px;text-align:center;background:#ffffff;">
                            <h1 style="margin:0;font-size:28px;line-height:1.35;font-weight:700;letter-spacing:-0.3px;text-shadow:0 1px 2px rgba(0,0,0,0.08);">
                                <span style="display:inline-block;background:linear-gradient(90deg,#0FA3B8 10%,#1AB3C5 30%,#2bd7bd 100%);-webkit-background-clip:text;background-clip:text;color:transparent;">
                                    Welcome to CarbonAI, {{ $user->name ?? 'there' }}!
                                </span>
                            </h1>
                            <p style="margin:18px 0 0;font-size:15px;line-height:1.65;color:#334155;">
                                We're excited to help you manage your carbon emissions with clarity and confidence.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px 44px 28px;background:#ffffff;">
                            <p style="margin:0;font-size:15px;line-height:1.75;color:#334155;">
                                Here’s what you can do next:
                            </p>
                            <ul style="margin:18px 0 0;padding-left:20px;font-size:14px;line-height:1.7;color:#475569;">
                                <li>Explore your dashboard to track Scope 1 & 2 emissions.</li>
                                <li>Use our guided workflows to add entries and manage categories.</li>
                                <li>Collaborate with your team effortlessly using CarbonAI tools.</li>
                            </ul>
                            <table role="presentation" cellpadding="0" cellspacing="0" style="margin:30px auto 0;">
                                <tr>
                                    <td>
                                        <a href="{{ config('app.url') }}" style="display:inline-block;padding:14px 32px;border-radius:999px;background:linear-gradient(90deg,#0FA3B8 10%,#1AB3C5 30%,#2bd7bd 100%);color:#06202e;font-weight:700;font-size:15px;text-decoration:none;">
                                            Go to dashboard
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            <p style="margin:28px 0 0;font-size:13px;line-height:1.7;color:#64748b;">
                                Need help getting started? Visit our knowledge base or reach out to support—our team is ready to assist.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:26px 40px 34px;background:#f8fafc;text-align:center;border-top:1px solid rgba(15,23,42,0.08);">
                            <p style="margin:0;font-size:12px;line-height:1.65;color:#64748b;">
                                © {{ now()->year }} CarbonAI. All rights reserved.
                            </p>
                            <p style="margin:16px 0 0;font-size:12px;line-height:1.6;">
                                <a href="{{ config('app.url') }}" style="color:#0fa3b8;text-decoration:none;">Visit CarbonAI</a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

