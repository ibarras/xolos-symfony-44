
        /*09/08/17
        juliofq
        Uso del APIV3 de Youtube para los videos desde el canal XoloTV(Xolos)*/
        $(document).ready(function()
        {
            $.get("https://www.googleapis.com/youtube/v3/playlistItems",
                {
                    part: 'snippet',
                    maxResults: 4,
                    playlistId: 'UULowRs-GNZ2lSDqHB50YXgQ',
                    key: 'AIzaSyCzE3UBtSWdy6sltyG-k9I1SnrcmhJETCY'
                },
                function(data)
                {
                    var output;
                    $.each(data.items, function(i, item)
                    {
                        titulo = item.snippet.title;
                        videoId = item.snippet.resourceId.videoId;
                        standard = item.snippet.thumbnails.standard.url;
                        high = item.snippet.thumbnails.high.url;
                        maxres = item.snippet.thumbnails.maxres.url;
                        if(i !== 0 && i !== 3)
                        {
                            output ='<div class="bg-xolos rounded-md w-full h-80 bg-cover bg-center relative" style="background-image: url('+ maxres +'\)">' +
                            '<div class="w-full h-full absolute flex justify-center rounded-b-md items-center ">' +
                                '<section class="w-full h-full rounded-b-md flex justify-center items-center bg-gradient-to-t from-black via-transparent  to-transparent">' +        
                                    '<button class="js-modal-btn" data-video-id= '+ videoId +' ><i class="far hover-play fa-play-circle fa-3x transform hover:scale-110 motion-reduce:transform-none" style="color: white;"></i></button>' +   
                                    '<h1 class="mx-4 absolute bottom-2 left-1 text-gray-100 text-xl md:text-4xl mb-2">' + titulo + '</h1>' +
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute bottom-5 right-4 transform hover:scale-110 motion-reduce:transform-none" fill="none" viewBox="0 0 24 24" stroke="WHITE">' +
                                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />' +
                                    '</svg>' +
                                '</section>' +
                            '</div>' + 
                    '</div>';
                        }
                        else {
                            output ='<div class="bg-xolos rounded-md w-full h-80 relative bg-cover bg-top xl:col-span-2 lg:col-span-2 md:col-span-2" style="background-image: url('+ maxres +'\)">' + 
                                        '<div class=" w-full h-full flex justify-center rounded-b-md bg-gradient-to-t from-black via-transparent to-transparent ">' +
                                            '<section class="w-full h-full rounded-b-md flex justify-center items-center bg-gradient-to-t from-black via-transparent  to-transparent">' +        
                                            '<button class="js-modal-btn" data-video-id= '+ videoId +' ><i class="far hover-play fa-play-circle fa-3x transform hover:scale-110 motion-reduce:transform-none" style="color: white;"></i></button>' +   
                                                '<h1 class="mx-4 absolute bottom-2 left-1 text-gray-100 text-xl md:text-4xl mb-2">' + titulo + '</h1>' +
                                                '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute bottom-5 right-4 transform hover:scale-110 motion-reduce:transform-none" fill="none" viewBox="0 0 24 24" stroke="WHITE">' +
                                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />' +
                                                '</svg>' +
                                            '</section>' +
                                        '</div>' +
                                    '</div>';
                        }
                        //output = '<a class="videoitem"><iframe src=\"//www.youtube.com/embed/'+videoId+'\"></iframe><a>';
                        //output = '<a class="owl-video videoitem" href=\"https://www.youtube.com/watch?v='+videoId+'\"></a>';
                        //output ='<div class="h-80 bg-red-500 bg-cover" style="background-image: url('+ maxres +'\)"></div>';
                        //output = '<div class="relative" style="padding-top: 40%"><iframe class="absolute inset-0 w-full h-full" src=\"//www.youtube.com/embed/'+videoId+'\"></iframe></div>';
                        $("#results").append(output);
                        
                    })

                    $(".js-modal-btn").modalVideo({
                        channel:'youtube',
                        youtube: {
                            autoplay: 1,
                            theme: 'dark',
                            color: 'red'
                        }
                    });

                }
            );
        });