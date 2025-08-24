@props(['class' => 'w-6 h-6'])
<svg {{ $attributes->merge(['class'=>$class]) }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
  <rect x="6" y="4" width="12" height="16" rx="2"/>
  <path d="M9 8h6M9 12h6M9 16h4" stroke-linecap="round"/>
</svg>
