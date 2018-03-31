import boto3
from sys import argv

script, name, roll_number = argv


s3 = boto3.resource('s3')


# Get list of objects for indexing
images=[( 'images/' + name , roll_number)
      ]

# Iterate through list to upload objects to S3   
for image in images:
	#print(image[0])
	file = open(image[0],'rb')
	object = s3.Object('class_collection','index/'+ image[0])
	ret = object.put(Body=file,
                    Metadata={'roll_number':image[1]}
                    )