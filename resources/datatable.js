async function getData(){
    try {
        alert('hi');
        const response = await fetch('https://timesofindia.indiatimes.com/rssfeeds/-2128838597.cms?feedtype=json');
        const data = await response.json();
        
        let tab = '';
        data.item.forEach(function (item) {
            tab += `
                <tr>
                    <td>${item.title}</td>
                    <td>${item.description}</td>
                    <td><a href="${item.link}">Link</a></td>
                    <td>${item.pubDate}</td>
                    <td><img src="${item.enclosure["@url"]}" alt="Image" width="100"/></td>
                </tr>
            `;
        });
        document.getElementById('tbody').innerHTML = tab;
        $('#myTable').DataTable({
            "data" : data.item,
            "columns":[
                {"data" : 'title'},
                {"data" : 'description'},
                {"data" : 'link'},
                {"data" : 'pubDate'},
                {"data" : 'enclosure'},
            ]
        })
    } catch (error) {
        console.error('Error fetching or parsing data:', error);
    }
}

getData();
