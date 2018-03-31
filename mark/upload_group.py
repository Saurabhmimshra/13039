import boto3
import datetime
from sys import argv

script, name = argv

i = datetime.datetime.now()
#ptr=str(i)
#smg='group1'+ptr+'.jpeg'



s3 = boto3.resource('s3')
s3.meta.client.upload_file('images/' + name, 'data-coll', 'dated/group1.jpeg')
