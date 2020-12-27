import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Pagination from "./Pagination";
import axios from 'axios'
import ListItem from "./ListItem";

class List extends Component {
    constructor() {
        super()
        this.state = {
            currentPage: 2,
            campaigns: [],
            pagination: {},
            selectedCampaign: null
        }
    }

    componentDidMount() {
        this.getCampaigns()
    }

    getCampaigns(pageNo = 1) {
        let url = '/api/campaigns?page=' + pageNo

        axios.get(url)
            .then(res => {
                let campaigns = res.data.data
                let pagination = res.data.pagination
                this.setState({
                    campaigns,
                    pagination
                })
            })
            .catch(err => {
                console.log(err)
            })
    }

    gotoPage = (pageNo) => {
        let currentPage = this.state.currentPage;
        if (pageNo == 'prev') {
            currentPage = this.state.currentPage - 1
            this.setState({
                currentPage
            })
        } else if (pageNo == 'next') {
            currentPage = this.state.currentPage + 1
            this.setState({
                currentPage
            })
        } else {
            currentPage = pageNo + 1
            this.setState({
                currentPage
            })
        }

        this.getCampaigns(currentPage)
    }

    showPaginationComponent() {
        if (Object.keys(this.state.pagination).length > 0 && this.state.pagination.last_page_no > 1) {
            return <Pagination
                currentPage={this.state.currentPage}
                pagination={this.state.pagination}
                gotoPage={this.gotoPage}
            />
        }
    }

    render() {
        return (
            <div className="row">
                <div className="col-md-12">
                    <div className="table-responsive">
                        <table className="table table-striped table-hover">
                            <thead>
                            <tr className="bg-primary text-white">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Daily Budget</th>
                                <th scope="col">Total Budget</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {this.state.campaigns.map(campaign =>
                                <ListItem key={campaign.id} campaign={campaign}></ListItem>
                            )
                            }
                            </tbody>
                        </table>
                    </div>
                </div>
                {this.showPaginationComponent()}
            </div>
        );
    }
}

export default List;

if (document.getElementById('campaign-list')) {
    ReactDOM.render(<List/>, document.getElementById('campaign-list'));
}
