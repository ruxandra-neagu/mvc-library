<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; color: #333; margin: 0; padding: 0; }
        .header { background: #212529; color: white; padding: 20px 30px; }
        .content { padding: 30px; }
        .table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        .table th { background: #f8f9fa; padding: 10px; text-align: left; border-bottom: 2px solid #dee2e6; }
        .table td { padding: 10px; border-bottom: 1px solid #dee2e6; }
        .total { font-size: 18px; font-weight: bold; color: #dc3545; }
        .footer { background: #f8f9fa; padding: 20px 30px; text-align: center; color: #666; font-size: 12px; }
        .badge { background: #ffc107; color: #000; padding: 4px 10px; border-radius: 20px; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <h2 style="margin:0;">📚 Universul Cărților</h2>
        <p style="margin:5px 0 0;">Confirmare comandă</p>
    </div>

    <div class="content">
        <p>Bună ziua, <strong>{{ $order->full_name }}</strong>!</p>
        <p>Comanda ta <strong>#{{ $order->id }}</strong> a fost plasată cu succes pe <strong>{{ $order->created_at->format('d.m.Y H:i') }}</strong>.</p>

        <h3>Produse comandate</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Carte</th>
                    <th>Cantitate</th>
                    <th>Preț unitar</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->book->title }}<br><small style="color:#666;">{{ $item->book->author }}</small></td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }} lei</td>
                    <td>{{ number_format($item->price * $item->quantity, 2) }} lei</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p class="total">Total: {{ number_format($order->total, 2) }} lei</p>

        <h3>Detalii livrare</h3>
        <p>
            <strong>Adresă:</strong> {{ $order->address }}, {{ $order->city }}, {{ $order->county }}, {{ $order->postal_code }}<br>
            <strong>Telefon:</strong> {{ $order->phone }}<br>
            <strong>Metodă de plată:</strong> {{ $order->payment_method == 'card' ? 'Card bancar' : 'Ramburs la livrare' }}<br>
            <strong>Status:</strong> <span class="badge">În așteptare</span>
        </p>

        <p style="color:#666; font-size:13px;">
            ⚠️ Poți anula comanda în primele 15 minute de la plasare din secțiunea <strong>Comenzile mele</strong>.
        </p>
    </div>

    <div class="footer">
        <p>© 2026 Universul Cărților · universulcartilor.contact@gmail.com</p>
    </div>
</body>
</html>