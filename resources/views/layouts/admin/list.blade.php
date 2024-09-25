@extends("layouts.admin.app")

@push('styles')
<link href="{{ asset('plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
@endpush

@push('scripts')
<script src="{{ asset('plugins/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatable/datatable.js')}}"></script>
<script src="{{ asset('plugins/datatable/datatable-2.js')}}"></script>
<script src="{{ asset('plugins/datatable/dataTables.responsive.min.js')}}"></script>
@endpush