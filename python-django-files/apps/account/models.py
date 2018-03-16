from django.db import models

class account(models.Model):
	class Meta:
		db_table = "account" #without Meta class defined, the db name will be `account_account`
	id = models.IntegerField(default=10000, primary_key=True)
	first_name = models.CharField(max_length=12)
	last_name = models.CharField(max_length=12)
	username = models.CharField(max_length=30)
	password = models.CharField(max_length=30)
	email = models.CharField(max_length=50)
	time_registered = models.DateTimeField(auto_now_add=True)
	time_last_login = models.DateTimeField(auto_now_add=True)
	ACC_TYPES = (
		('ss','store superuser'),
		('sc','store cook'),
		('dm','delivery man'),
		('fc','food customer'),	
	)
	account_type = models.CharField(max_length=2, choices = ACC_TYPES)

#class address(models.Model): #db account_address


