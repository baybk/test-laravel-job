import React, { Component } from 'react';
import Breadcrumb from '../partials/Breadcrumb';
import { Link } from 'react-router-dom';
import DashboardApis from '../../apis/Dashboard';


class Dashboard extends Component
{
    constructor(props)
    {
       super(props);
        
        this.state = {
            count_users: 0,
            count_posts: 0,
            count_comments: 0,
            count_categories: 0,
        }

        document.body.classList.remove("login-page");
        document.body.classList.add("skin-green");
    }

    componentDidMount() {
        DashboardApis.getData()
            .then(response => {
                let data = response.data.data;
                this.setState({
                    count_users: data.count_users,
                    count_posts: data.count_posts,
                    count_comments: data.count_comments,
                    count_categories: data.count_categories,
                });
            });
    }

    render() {
        const {count_users, count_posts, count_comments, count_categories} = this.state;
        return (
            <div className="content-wrapper">

                <section className="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>

                    <Breadcrumb />

                </section>

                <section className="content">
                    <div className="row">
                        <div className="col-lg-3 col-xs-6">
                            <div className="small-box bg-aqua">
                                <div className="inner">
                                    <h3>Posts <span className="dboard_count_items">({count_posts})</span></h3>
                                </div>
                                <div className="icon">
                                    <i className="fa fa-newspaper-o"></i>
                                </div>
                                <Link to="/posts" className="small-box-footer">More info <i className="fa fa-arrow-circle-right"></i></Link>
                            </div>
                        </div>
                        <div className="col-lg-3 col-xs-6">
                            <div className="small-box bg-green">
                                <div className="inner">
                                    <h3>Categories <span className="dboard_count_items">({count_categories})</span></h3>

                                    <p></p>
                                </div>
                                <div className="icon">
                                    <i className="fa fa-list"></i>
                                </div>
                                <Link to="/categories" className="small-box-footer">More info <i className="fa fa-arrow-circle-right"></i></Link>
                            </div>
                        </div>
                        <div className="col-lg-3 col-xs-6">
                            <div className="small-box bg-yellow">
                                <div className="inner">
                                    <h3>Comments <span className="dboard_count_items">({count_comments})</span></h3>

                                    <p></p>
                                </div>
                                <div className="icon">
                                    <i className="fa fa-comments-o"></i>
                                </div>
                                <Link to="/comments" className="small-box-footer">More info <i className="fa fa-arrow-circle-right"></i></Link>
                            </div>
                        </div>
                        <div className="col-lg-3 col-xs-6">
                            <div className="small-box bg-red">
                                <div className="inner">
                                    <h3>Users <span className="dboard_count_items">({count_users})</span></h3>

                                    <p></p>
                                </div>
                                <div className="icon">
                                    <i className="fa fa-users"></i>
                                </div>
                                <Link to="/users" className="small-box-footer">More info <i className="fa fa-arrow-circle-right"></i></Link>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        )
    }
}

export default Dashboard;