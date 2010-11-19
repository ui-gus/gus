from django.shortcuts import render_to_response
from django.template import Context, loader, RequestContext
from django.http import HttpResponse
from django import forms
from gus.gus_groups.models import *

def index(request):
	return HttpResponse("Gus Home")
#	return render_to_response('index_joran.html',{'lform':lform,'rform':rform},context_instance=RequestContext(request))
	
def super_manager(request):
	return HttpResponse("Super Manager!!!!")
def super_user_manager(request):
	return HttpResponse("Super UManager!!!!")
def super_group_manager(request):
	return HttpResponse("Super GManager!!!!")


def user_detail_view(request,user_id):
	usr=gus_roles.objects.get(uid=user_id)
	return HttpResponse("View User Detail For User "+usr.uid.all()[0]._user.username)
	
