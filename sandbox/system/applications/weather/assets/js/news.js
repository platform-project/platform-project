//const API_KEY="6ab917cf0dc84ae5973ecb8e47fc3ebe" // newsapi.org
const API_KEY="pub_775262f61f7f143dd1c0108bf823611d218b" // newsdata.io

function getNewsData()
{
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    var today = yyyy + '-' + mm + '-' + dd;

    var res = new Headers();

    async function getNews() {
        try { 
            var proxy_url = 'https://cors-anywhere.herokuapp.com/';
            var url = 'https://newsdata.io/api/1/news?apikey='+API_KEY+'&country=us,gb,za&language=en'
            //var url = 'https://newsapi.org/v2/top-headlines?country=us&pageSize=1&apiKey='+API_KEY
            const response = await fetch(proxy_url + url);

            if (!await response.ok) {
              throw new Error(`Error! \nstatus: ${await response.status}`);
            }

            const result = await response.json();
            return await result;
        } catch (err) {
            console.log(err);
        }
    }

    var news = getNews();
    var data = '';
    news.then((value) => {
        console.log(value); //This is a fulfilled promise  👈
        if (value){
            for (i = 0; i < value.results.length/2; i++)
            {
                data += '<li class="news title"><a href="'+ value.results[i].link +'" target="_blank">' + value.results[i].title + '</a></li>';
            }
        } else {
            data = '<li class="news title">News articles are not available at the moment!<li>'
        }
        $('ul.news.data').html(data);
      })
      .catch((err) => {
        console.log(err); 
      });
}

getNewsData();
setInterval(function() {
   getNewsData();
}, 3600000);

//console.log(news);
