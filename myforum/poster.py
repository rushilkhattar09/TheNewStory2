import bs4, requests, os, time

def modify(query):
    l = query.split(' ')
    return '+'.join(l)

def remove_ref(src):
    ref_list = [i for i in src]
    ref_list = ref_list[-1:-len(ref_list) - 1: -1]

    while ref_list[0] != '?':
        ref_list.remove(ref_list[0])

    ref_list.remove(ref_list[0])

    ref_list = ref_list[-1:-len(ref_list) - 1: -1]

    return ''.join(ref_list)

def movie(name, save_loc):

    if not os.path.isdir(save_loc):
        os.mkdir(save_loc)

    os.chdir(save_loc)

    url = 'http://www.imdb.com/find?ref_=nv_sr_fn&q='+modify(name)+'&s=all'
    r = requests.get(url)
    
    soup = bs4.BeautifulSoup(r.text, 'lxml')
    
    for table in soup.findAll('table', attrs = {'class':'findList'}):
        a = table.find('a')

        subLink = 'http://www.imdb.com'+a['href']
        subSoup = bs4.BeautifulSoup(requests.get(subLink).text, 'lxml')

        for head in subSoup.findAll('head'):
            meta = head.findAll('meta')

            for i in meta:
                if i.attrs.has_key('property') and i.attrs['property'] == 'og:url':
                    src = i.attrs['content'][26:-1]+'.jpg'
                if i.attrs.has_key('property') and i.attrs['property'] == 'og:image':
                    source = i.attrs['content']
                    break
        break

    if not os.path.isdir('<folder path>'+name):
        os.mkdir('<folder path>'+name)
#    os.chdir(os.getcwd()+'/'+name)
    with open('<folder path>'+name+'/'+src, 'wb') as f:
        f.write(requests.get(source).content)

with open("<path> list.txt") as movs:
    movs = movs.readlines()
    for a in movs:
	print "Downloading", a[:-1], "..."
	movie(a[:-1], 'Posters')
	print "Downloaded"
	time.sleep(1)