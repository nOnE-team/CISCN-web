from flask import Flask,request,redirect, render_template,Response,send_from_directory
from werkzeug.utils import secure_filename
import pickle
import os
import base64
app=Flask(__name__)

class webSite:
    def __init__(self,name='CISCN2020',describe='这比赛, 不打也罢!'):
        self.name=name
        self.describe=describe
site=webSite()
@app.route('/')
def none():
    return redirect('/index.php')
@app.route('/index.php')
def index():
    global site
    try:
        if ("{" in site.name and "}" in site.name) or ("{" in site.describe and "}" in site.describe):
            if ('LOL, No SSTI' not in site.name )and ('LOL, No SSTI' not in site.describe):
                site.name+="LOL, No SSTI"
                site.describe+="LOL, No SSTI"
            return render_template('index.html',name=site.name,des=site.describe,img='hit.gif',hit='1000')
        return render_template('index.html',name=site.name,des=site.describe,img='waizui.png',hit='500')
    except Exception:
        site=webSite(name='Error',describe='Error')
        return render_template('index.html',name=site.name,des=site.describe,img='waizui.png',hit='500')
@app.route('/manage.php',methods=["GET","POST"])
def manage():
    global site
    newName=request.args.get("name")
    newdes=request.args.get('describe')
    if newName:
        site.name=newName
    if newdes:
        site.describe=newdes
    
    with open('./data.pickle','wb')as f:
        pickle.dump(site,f)
    return redirect('/')

@app.route('/data.pickle')
def pull():
    global site
    with open('./data.pickle','wb')as f:
        pickle.dump(site,f)
    return send_from_directory('./','data.pickle',as_attachment=True)
@app.route('/push.php',methods=['POST'])
def push():
    if request.method == 'POST':
        if 'file' not in request.files:
            return('No File!')
        file = request.files['file']
        if file.filename == '':
            return 'no File Name!'
        filename = secure_filename(file.filename)
        file.save(filename)
        if 1:
            with open('./'+filename,'rb') as f:
                s=f.read()
                # if b'R' in s:
                #     return '''
                #     NO "R" !! NO __REDUCE__()!!
                #     '''
            global site
            site=pickle.loads(s)
            return redirect('/')
        
         

if __name__ == "__main__":

    app.run(host='0.0.0.0',port=80,debug=0)