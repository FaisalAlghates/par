<x-layouts.app :title="__('Dashboard')">
<div>
    <h1>Test Dashboard</h1>
    @for($i = 1; $i <= 2; $i++)
        <p>Item {{ $i }}</p>
    @endfor
</div>
</x-layouts.app>
