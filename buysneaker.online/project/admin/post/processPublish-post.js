
function unpublish(id){
    var option = confirm('Do you want to unpublish this News?')	
    if (!option){
        return;
    }
    console.log(id)
    //ajax - xu ly lenh post
    $.post('post/processPublish-post.php',{
        'id':id,
        'action': 'unpublish'
    },function(data){
        location.reload()
    })
}

function publish(id){
    var option = confirm('Do you want to publish this News?')	
    if (!option){
        return;
    }
    console.log(id)
    //ajax - xu ly lenh post
    $.post('post/processPublish-post.php',{
        'id':id,
        'action': 'publish'
    },function(data){
        location.reload()
    })
}