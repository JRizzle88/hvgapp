@extends('layout.filemanager')

@section('content')
    <h2>File Manager</h2>
    <div class="row">
        <div class="col-sm-12">
            <p class="text-muted"><small>Note: There are file types that do not yet have an icon.</small></p>
        </div>
        <div class="col-sm-12">
            <div class="well upload-file">
                <form class="btn-group" action="{{route('addentry', [])}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="btn btn-sm" type="file" name="filefield">  
                    <input class="btn btn-sm btn-success pull-right" type="submit">
                </form>
                <span class="pull-right btn-group" role="tablist">
                    <a href="#gridview" class="btn btn-sm btn-danger active" role="tab" data-toggle="tab"><i class="fa fa-windows"></i> Grid View</a>
                    <a href="#listview" class="btn btn-sm btn-danger" role="tab" data-toggle="tab"><i class="fa fa-th-list"></i> List View</a>
                </span>
             </div>
         </div>
     </div>
     
     <div class="row">
        @if ( !$entries->count() )
			You have no Files uploaded.
		@else
        <div class="tab-content">
            
            <div role="tabpanel" class="tab-pane fade in active" id="gridview">
                <ul class="fileentry thumbnails no-padding">
                    @foreach($entries as $entry)
                        <div class="thumbnail col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <a class="file-container" data-toggle="modal" data-target="#lightbox">
                                @if ($entry->mime == 'text/plain')
                                    <p><i class="fa fa-file-text-o"></i></p>
                                    <p><small>{{$entry->original_filename}}</small></p>
                                @elseif ($entry->mime == 'image/jpeg' || $entry->mime == 'image/png')                           
                                    <img src="{{route('getentry', $entry->filename)}}" alt="{{$entry->original_filename}}" class="img-responsive" />
                                @endif
                            </a>
                            <div class="caption">
                                <div class="btn-group btn-group-justified">
                                   <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#lightbox"><i class="fa fa-external-link"></i><br><small>View</small></a> 
                                   <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#file-info"><i class="fa fa-gear"></i><br><small>Info</small></a>
                                   <a class="btn btn-sm btn-danger" href="{{route('getentry', $entry->filename)}}"><i class="fa fa-copy"></i><br><small>Url</small></a> 
                                   <a class="btn btn-sm btn-danger" href="{{route('getentry', $entry->filename)}}"><i class="fa fa-eye"></i><br><small>Raw</small></a>
                                   <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i><br><small>Trash</small></a>
                                </div>
                            </div>         
                        </div>
                    @endforeach
                </ul>
                <div class="clearfix"></div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="listview">
                <table class="file-manager-table table table-hover">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Original File Name</th>
                            <th>Url</th>
                            <th>Mime Type</th>
                            <th>Uploaded</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($entries as $entry)
                        <tr>
                            <td>
                                @if ($entry->mime == 'text/plain')
                                    <p><i class="fa fa-file-text-o fa-2x"></i>
                                    <small>{{$entry->original_filename}}</small></p>
                                @elseif ($entry->mime == 'image/jpeg' || $entry->mime == 'image/png')                           
                                    <img class="list-view-image img-thumbnail" src="{{route('getentry', $entry->filename)}}" alt="{{$entry->original_filename}}" />
                                @endif
                            </td>
                            <td>{{ $entry->original_filename }}</td>
                            <td><a href="{{ route('getentry', $entry->filename) }}">{{ route('getentry', $entry->filename) }}</a></td>
                            <td>{{ $entry->mime }}</td>
                            <td>{{ $entry->created_at }}
                            <td></td>
                        </tr>
                     @endforeach
                     </tbody>
                 </table>
            </div>
        </div>
        
     </div>
     
     <!-- Lightbox for File Entry modal view -->
     <div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="modal-content">
                <div class="modal-body">
                     @if ($entry->mime == 'text/plain')
                        <iframe src="{{route('getentry', $entry->filename)}}" width="600" height="600" frameborder="0" allowtransparency="true"></iframe>
                    @elseif ($entry->mime == 'image/jpeg' || $entry->mime == 'image/png')                           
                        <img src="{{route('getentry', $entry->filename)}}" alt="{{$entry->original_filename}}" class="img-responsive" />
                    @endif  
                </div>
            </div>
        </div>
        
      <!-- Modal for Info -->
     <div id="file-info" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="modal-content">
                <div class="modal-body">
                    {{$entry->mime}}
                </div>
            </div>
        </div>
    </div>
    @endif
 @endsection