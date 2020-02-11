import requests
from bs4 import BeautifulSoup

f = open('normal_href_data.txt', 'w', encoding='utf-8')

req = requests.get('https://computer.cnu.ac.kr/computer/notice/notice.do')
html = req.text
soup = BeautifulSoup(html, 'html.parser')

for data in soup.select('.b-title-box > a'):
    print(data.text.strip(), file=f)
    print(data.get('href'), file=f)

f.close()