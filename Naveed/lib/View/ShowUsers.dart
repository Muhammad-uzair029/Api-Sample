import 'package:Naveed/Controller/ShowUserController.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'dart:async';
class ShowUser extends StatefulWidget {
  @override
  _ShowUserState createState() => _ShowUserState();
}

class _ShowUserState extends State<ShowUser> {


final ShowUSerController _showusers = Get.put(ShowUSerController());

StreamController _postsController;
  void initState() {
 
    super.initState();
   _postsController=new StreamController();
   Timer.periodic(Duration(seconds: 1), (Timer t)async {
 
    _showusers.loadPosts(_postsController);
   
    });
  }
  Future<Null> _handleRefresh() async {
    _showusers.count++;
    print(_showusers.count);
    _showusers.fetchPost(_showusers.count * 5).then((res) async {
      _postsController.add(res);
      _showusers.showSnack();
      return null;
    });
  }

  @override
  Widget build(BuildContext context) {
    return new Scaffold(
      key: _showusers.scaffoldKey,
      appBar: new AppBar(
        title: new Text('StreamBuilder'),
        actions: <Widget>[
          IconButton(
            tooltip: 'Refresh',
            icon: Icon(Icons.refresh),
            onPressed: _handleRefresh,
          )
        ],
      ),
      body: StreamBuilder(
        stream:_postsController.stream,
        builder: (BuildContext context, AsyncSnapshot snapshot) {
          print('Has error: ${snapshot.hasError}');
          print('Has data: ${snapshot.hasData}');
          print('Snapshot Data ${snapshot.data}');

          if (snapshot.hasError) {
            return Text(snapshot.error);
          }

          if (snapshot.hasData) {
            return Column(
              children: <Widget>[
                Expanded(
                  child: Scrollbar(
                    child: RefreshIndicator(
                      onRefresh:_handleRefresh,
                      child: ListView.builder(
                        physics: const AlwaysScrollableScrollPhysics(),
                        itemCount: snapshot.data.length,
                        itemBuilder: (context, index) {
                          var post = snapshot.data[index];
                          return ListTile(
                            title: Text(post['name']),
                            subtitle: Text(post['email']),
                          );
                        },
                      ),
                    ),
                  ),
                ),
              ],
            );
          }

          if (snapshot.connectionState != ConnectionState.done) {
            return Center(
              child: CircularProgressIndicator(),
            );
          }

          if (!snapshot.hasData &&
              snapshot.connectionState == ConnectionState.done) {
            return Text('No Posts');
          }
        },
      ),
    );
  }
}










