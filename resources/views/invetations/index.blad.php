<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة الدعوات</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2 class="mb-4">قائمة الدعوات</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>التصنيف</th>
                <th>المؤسسة</th>
                <th>عرض PDF</th>
            </tr>
        </thead>
        <tbody>
            @forelse($invitations as $index => $invitation)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $invitation->name }}</td>
                    <td>{{ $invitation->email }}</td>
                    <td>{{ $invitation->cat }}</td>
                    <td>{{ $invitation->org ?? 'غير متوفر' }}</td>
                    <td>
                        @if($invitation->link)
                            <a href="{{ asset('storage/' . basename($invitation->link)) }}" target="_blank" class="btn btn-primary">فتح الدعوة</a>
                        @else
                            <span class="text-danger">غير متوفر</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">لا توجد دعوات مسجلة.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
