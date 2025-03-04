$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function sendDeleteRequest(id, url) {
    $.ajax({
        type: 'DELETE',
        url: url,
        data: { id: id },
        dataType: 'JSON',
        success: function(response) {
            if (response.error === false) {
                Swal.fire('Xóa thành công!', response.message, 'success')
                    .then(() => location.reload());
            } else {
                Swal.fire('Lỗi!', 'Xóa không thành công, vui lòng thử lại.', 'error');
            }
        },
        error: function() {
            Swal.fire('Lỗi!', 'Có lỗi xảy ra, vui lòng thử lại sau.', 'error');
        }
    });
}

// Hàm xác nhận xóa
function deleteBranch(event, id, url) {
    event.preventDefault();
    
    Swal.fire({
        title: 'Bạn có chắc muốn xóa?',
        text: 'Bạn không thể khôi phục được nữa!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Vâng, hãy xóa!',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            sendDeleteRequest(id, url);
        }
    });
}
function removeRow(id, url) {
    if(confirm('Bạn có chắc xóa hay không?')) {
        $.ajax( {
            type:'DELETE',
            datatype: 'JSON',
            data: {
                id
            },
            url: url,
            success: function($result) {
                if($result.error === false) {
                    alert($result.message);
                    location.reload();
                }else{
                    alert('Xóa không thành công, vui lòng thử lại');
                }
            }
        })
    }
}


// Upload

$('#upload').change(function() {
    const form = new FormData();

    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType:false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function(results) {
            if(results.error === false) {
                $('#image_show').html('<a href="' + results.url + '"target="_blank" >'
                    + '<img src="' +  results.url + '"width= "100px"></a>');

                $('#thumnb ').val(results.url);
            }   
            else{
                alert('Upload không thành công ')
            }
        }
    });
})

