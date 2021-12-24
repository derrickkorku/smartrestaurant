<div class="container-fluid">
    <div class="row mt-3">
        <div class="col text-center">
            <h4>Total Sales Today | {{ $total_sales }} </h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <livewire:tables.sales-today-table exportable hideable="select" />
        </div>
    </div>
</div>
