
import 'dart:async';
import 'dart:convert';

import 'package:Naveed/Controller/ShowUserController.dart';
import 'package:Naveed/View/ShowUsers.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
void main() {
  runApp(MyApp());
}
 
class MyApp extends StatelessWidget {
   @override 
   Widget build(BuildContext context) {
      return MaterialApp(
         title: 'Flutter Demo', 
         theme: ThemeData( 
            primarySwatch: Colors.blue, 
         ), 
         home:ShowUser(), 
      ); 
   }
}

