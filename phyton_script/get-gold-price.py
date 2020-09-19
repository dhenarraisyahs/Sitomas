import yfinance
from datetime import datetime,timedelta
import json
import requests
from flask import Flask, json
import pandas

api = Flask(__name__)

yesterday = datetime.today() - timedelta(days=1)
lusa = datetime.today() - timedelta(days=3)

# Ini url bakal start di 127.x.x.x/sitomas/ticker
@api.route('/sitomas/tickers', methods=['GET'])

def get_emas():
    data = yfinance.download(tickers="GC=F USDIDR=X", start=yesterday.strftime("%Y-%m-%d"), end=yesterday.strftime("%Y-%m-%d"))

    #adj_close
    adj_close = data.loc[:,'Adj Close']

    # close
    close = data.loc[:,'Close']

    # High
    high = data.loc[:,'High']

    # Low
    low = data.loc[:,'Low']

    # Open
    open = data.loc[:,'Open']

    # Volume
    volume = data.loc[:,'Volume']
    
    data_json = {
        "adjClose"  : json.loads(adj_close.to_json(index=True, orient='index',date_format='iso')),
        "close"     : json.loads(close.to_json(index=True, orient='index',date_format='iso')),
        "high"      : json.loads(high.to_json(index=True, orient='index',date_format='iso')),
        "low"       : json.loads(low.to_json(index=True, orient='index',date_format='iso')),
        "open"      : json.loads(open.to_json(index=True, orient='index',date_format='iso')),
        "volume"    : json.loads(volume.to_json(index=True, orient='index',date_format='iso'))
    }

    return json.dumps(data_json)

if __name__ == '__main__':
    api.run()