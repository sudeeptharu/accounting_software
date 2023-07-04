<ul>
@foreach($data as $ledgertype)
    <li>
    <h2>{{ $ledgertype->title }}</h2>
        <ul>
    @foreach($ledgertype->ledger_groups as $ledger_groups)
      <li>
        <h3>{{ $ledger_groups->title }}</h3>
          <ul>
        @foreach($ledger_groups->ledgers as $ledgers)
            <li>
                <p>{{ $ledgers->title }}</p>
            </li>
        @endforeach
          </ul>
      </li>
    @endforeach
        </ul>
    </li>
@endforeach
</ul>
