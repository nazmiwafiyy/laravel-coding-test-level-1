@extends('layouts.app')
@section('content')
    <div class="row pt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="catfact" >
                            <thead>
                            <tr>
                                <th width="10%" scope="col">#</th>
                                <th scope="col">Cat Fact</th>
                            </tr>
                            </thead>
                            <tbody id="catfactBody">

                            </tbody>
                        </table>
                    </div>
                    <nav>
                        <ul class="pagination">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
$(document).ready(function (){
    callApi("https://catfact.ninja/facts");
});

    
function callApi(url){
    $("#catfactBody").empty();
    $(".pagination").empty();
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            var pagination = '';
            $.each(result.data, function(i, item) {
                $('#catfact').append('<tr><td>'+(parseInt(i)+1)+'</td><td>'+item.fact+'</td></tr>');
            });


            $.each(result.links, function(i, item) {
                if(item.url == null && item.label == 'Previous'){
                    pagination += '<li class="page-item disabled" aria-disabled="true"><span class="page-link" href="javascript:callApi(\''+ item.url +'\')">&lsaquo;</span></li>';
                }else if(item.label == 'Previous'){
                    pagination += '<li class="page-item"><a class="page-link" href="javascript:callApi(\''+ item.url +'\')">&lsaquo;</a></li>';
                }else if(item.url == null && item.label == 'Next'){
                    pagination += '<li class="page-item disabled"><span class="page-link" href="javascript:callApi(\''+ item.url +'\')">&rsaquo;</span></li>';
                }else if(item.label == 'Next'){
                    pagination += '<li class="page-item"><a class="page-link" href="javascript:callApi(\''+ item.url +'\')">&rsaquo;</a></li>';
                }else{
                    if(item.active == true){
                        pagination += '<li class="page-item active"><span class="page-link" href="javascript:callApi(\''+ item.url +'\')">'+item.label+'</span></li>';
                    }else if(item.url == null){
                        pagination += '<li class="page-item disabled"><span class="page-link" href="javascript:callApi(\''+ item.url +'\')">'+item.label+'</span></li>';
                    }else{
                        pagination += '<li class="page-item"><a class="page-link" href="javascript:callApi(\''+ item.url +'\')">'+item.label+'</a></li>';
                    }
                }

            });

            $('.pagination').append(pagination);
        }
    });
}


@endsection