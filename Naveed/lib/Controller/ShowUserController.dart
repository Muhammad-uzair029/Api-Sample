import 'dart:async';
import 'dart:convert';

import 'package:Naveed/Models/showUserModel.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;

class ShowUSerController extends GetxController {

    final GlobalKey<ScaffoldState> scaffoldKey = new GlobalKey<ScaffoldState>();

   int count = 1;

  Future fetchPost([howMany = 5]) async {
     
    final response = await http.get(  
        'http://192.168.0.110/Naveed_Task/getdata.php');

    if (response.statusCode == 200) {
      return json.decode(response.body);
    } else {
      throw Exception('Failed to load post');
    }
  }

  loadPosts(StreamController _postsController) async {
    fetchPost().then((res) async {
      _postsController.add(res);
      return res;
    });
  }

  showSnack() {
    return scaffoldKey.currentState.showSnackBar(
      SnackBar(
        content: Text('New content loaded'),
      ),
    );
  }

}
