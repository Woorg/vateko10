<a href="{{'tel:' . str_replace( [
    ")",
    "(",
    " ",
    "-",
  ], "", $phone )}}" class="topline__phone">{{ $phone }}</a>
