export default function _get(url) {
    $get(url, function(data, status){
        console.log(status);
        return data;
    });
}
