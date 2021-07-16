function deletePost(id){
    var option = confirm('Do you want to delete this News?')	
    if (!option){
        return;
    }
    console.log(id)
    //ajax - xu ly lenh post
    $.post('post/processDelete-post.php',{
        'id':id,
        'action': 'delete'
    },function(data){
        location.reload()
    })
}